<?php
class ServiceOrderTypesController extends AppController {

	var $name = 'ServiceOrderTypes';

	function index() {
		parent::index();
	
		$this->ServiceOrderType->recursive = 0;
		$this->set('serviceOrderTypes', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
		
		$parents = $this->ServiceOrderType->ParentServiceOrderType->find('list');
		$this->set(compact('parents'));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service order type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceOrderType', $this->ServiceOrderType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ServiceOrderType->create();
			if ($this->ServiceOrderType->save($this->data)) {
				$this->Session->setFlash(__('The service order type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order type could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->ServiceOrderType->ParentServiceOrderType->find('list');
		$this->set(compact('parents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrderType->save($this->data)) {
				$this->Session->setFlash(__('The service order type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrderType->read(null, $id);
		}
		$parents = $this->ServiceOrderType->ParentServiceOrderType->find('list');
		$this->set(compact('parents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service order type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceOrderType->delete($id)) {
			$this->Session->setFlash(__('Service order type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service order type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>