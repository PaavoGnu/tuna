<?php
class AssetMovimentOperationsController extends AppController {

	var $name = 'AssetMovimentOperations';

	function index() {
		$this->AssetMovimentOperation->recursive = 0;
		$this->set('assetMovimentOperations', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid asset moviment operation ', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('assetMovimentOperation', $this->AssetMovimentOperation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->AssetMovimentOperation->create();
			if ($this->AssetMovimentOperation->save($this->data)) {
				$this->Session->setFlash(__('The asset moviment operation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asset moviment operation could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid asset moviment operation ', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->AssetMovimentOperation->save($this->data)) {
				$this->Session->setFlash(__('The asset moviment operation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asset moviment operation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AssetMovimentOperation->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for asset moviment operation ', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AssetMovimentOperation->delete($id)) {
			$this->Session->setFlash(__('Asset moviment operation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Asset moviment operation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>