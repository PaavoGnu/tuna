<?php
class AssetMovimentsController extends AppController {

	var $name = 'AssetMoviments';

	function index() {
		$this->AssetMoviment->recursive = 0;
		$this->set('assetMoviments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid asset moviment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('assetMoviment', $this->AssetMoviment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['AssetMoviment']['user_id'] = $this->Auth->user('id');
			$this->AssetMoviment->create();
			
			if ($this->AssetMoviment->save($this->data)) {		
				$this->Session->setFlash(__('The asset moviment has been saved', true));
				$this->redirect(array('action' => 'view', $this->AssetMoviment->id));
			} else {
				$this->Session->setFlash(__('The asset moviment could not be saved. Please, try again.', true));
			}
		}
		$enterprises = $this->AssetMoviment->Enterprise->find('list');
		$enterpriseUnits = array();
		$assetMovimentTypes = $this->AssetMoviment->AssetMovimentType->find('list');
		$users = $this->AssetMoviment->User->find('list');
		$this->set(compact('enterprises', 'enterpriseUnits', 'assetMovimentTypes', 'users'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid asset moviment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['AssetMoviment']['user_id'] = $this->Auth->user('id');
			
			if ($this->AssetMoviment->save($this->data)) {
				$this->Session->setFlash(__('The asset moviment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The asset moviment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->AssetMoviment->read(null, $id);
		}
		$enterprises = $this->AssetMoviment->Enterprise->find('list');
		$enterpriseUnits = $this->AssetMoviment->EnterpriseUnit->find('list');
		$assetMovimentTypes = $this->AssetMoviment->AssetMovimentType->find('list');
		$users = $this->AssetMoviment->User->find('list');
		$this->set(compact('enterprises', 'enterpriseUnits', 'assetMovimentTypes', 'users'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for asset moviment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->AssetMoviment->delete($id)) {
			$this->Session->setFlash(__('Asset moviment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Asset moviment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function getEnterpriseUnit() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$enterpriseUnits = $this->AssetMoviment->EnterpriseUnit->find('list', array('conditions' =>
			'EnterpriseUnit.id in (SELECT enterprise_unit_id FROM enterprises_enterprise_units
				WHERE enterprise_id = '.$_POST['data']['AssetMoviment']['enterprise_id'].')', 'order' => 'EnterpriseUnit.enterprise_unit_structure'));
		
		echo '<option value=""></option>';
		
		foreach($enterpriseUnits as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>