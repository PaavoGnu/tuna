<?php
class AssetMovimentTypesController extends AppController {

	var $name = 'AssetMovimentTypes';

	function index() {
		parent::index();
	
		$this->AssetMovimentType->recursive = 0;
		$this->set('assetMovimentTypes', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
		
		$parents = $this->AssetMovimentType->ParentAssetMovimentType->find('list');
		$assetMovimentOperations = $this->AssetMovimentType->AssetMovimentOperation->find('list');
		$this->set(compact('parents', 'assetMovimentOperations'));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid asset moviment type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('assetMovimentType', $this->AssetMovimentType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AssetMovimentType->create();
			if ($this->AssetMovimentType->save($this->data)) {
				$this->Session->setFlash(__('The asset moviment type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asset moviment type could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->AssetMovimentType->ParentAssetMovimentType->find('list');
		$assetMovimentOperations = $this->AssetMovimentType->AssetMovimentOperation->find('list');
		$this->set(compact('parents', 'assetMovimentOperations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid asset moviment type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AssetMovimentType->save($this->data)) {
				$this->Session->setFlash(__('The asset moviment type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asset moviment type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AssetMovimentType->read(null, $id);
		}
		$parents = $this->AssetMovimentType->ParentAssetMovimentType->find('list');
		$assetMovimentOperations = $this->AssetMovimentType->AssetMovimentOperation->find('list');
		$this->set(compact('parents', 'assetMovimentOperations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for asset moviment type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AssetMovimentType->delete($id)) {
			$this->Session->setFlash(__('Asset moviment type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Asset moviment type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>