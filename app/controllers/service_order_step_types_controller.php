<?php
class ServiceOrderStepTypesController extends AppController {

	var $name = 'ServiceOrderStepTypes';

	function index() {
		$this->ServiceOrderStepType->recursive = 0;
		$this->set('serviceOrderStepTypes', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service order step type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceOrderStepType', $this->ServiceOrderStepType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ServiceOrderStepType->create();
			if ($this->ServiceOrderStepType->save($this->data)) {
				$this->Session->setFlash(__('The service order step type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order step type could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->ServiceOrderStepType->ParentServiceOrderStepType->find('list');
		$this->set(compact('parents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order step type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrderStepType->save($this->data)) {
				$this->Session->setFlash(__('The service order step type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order step type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrderStepType->read(null, $id);
		}
		$parents = $this->ServiceOrderStepType->ParentServiceOrderStepType->find('list');
		$this->set(compact('parents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service order step type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceOrderStepType->delete($id)) {
			$this->Session->setFlash(__('Service order step type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service order step type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
