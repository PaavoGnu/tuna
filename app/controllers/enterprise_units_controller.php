<?php
class EnterpriseUnitsController extends AppController {

	var $name = 'EnterpriseUnits';
    
	function index() {
		parent::index();
	
		$this->EnterpriseUnit->recursive = 0;
		$this->set('enterprise_units', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
		
		$parents = $this->EnterpriseUnit->ParentEnterpriseUnit->find('list');
		$enterprises = $this->EnterpriseUnit->Enterprise->find('list');
		$entities = $this->EnterpriseUnit->Entity->find('list');
		$stocks = $this->EnterpriseUnit->Stock->find('list');
		$this->set(compact('parents', 'enterprises', 'entities', 'stocks'));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid enterprise unit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('enterprise_unit', $this->EnterpriseUnit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EnterpriseUnit->create();
			if ($this->EnterpriseUnit->save($this->data)) {
				$this->Session->setFlash(__('The enterprise unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enterprise unit could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->EnterpriseUnit->ParentEnterpriseUnit->find('list');
		$enterprises = $this->EnterpriseUnit->Enterprise->find('list');
		$entities = $this->EnterpriseUnit->Entity->find('list');
		$stocks = $this->EnterpriseUnit->Stock->find('list');
		$this->set(compact('parents', 'enterprises', 'entities', 'stocks'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid enterprise unit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EnterpriseUnit->save($this->data)) {
				$this->Session->setFlash(__('The enterprise unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enterprise unit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EnterpriseUnit->read(null, $id);
		}
		$parents = $this->EnterpriseUnit->ParentEnterpriseUnit->find('list');
		$enterprises = $this->EnterpriseUnit->Enterprise->find('list');
		$entities = $this->EnterpriseUnit->Entity->find('list');
		$stocks = $this->EnterpriseUnit->Stock->find('list');
		$this->set(compact('parents', 'enterprises', 'entities', 'stocks'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for enterprise unit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EnterpriseUnit->delete($id)) {
			$this->Session->setFlash(__('Enterprise unit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Enterprise unit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
