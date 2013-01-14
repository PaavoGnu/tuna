<?php
class EntityTechniciansController extends AppController {

	var $name = 'EntityTechnicians';

	function index() {
		$this->EntityTechnician->recursive = 0;
		$this->set('entityTechnicians', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid entity technician', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('entityTechnician', $this->EntityTechnician->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EntityTechnician->create();
			if ($this->EntityTechnician->save($this->data)) {
				$this->Session->setFlash(__('The entity technician has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity technician could not be saved. Please, try again.', true));
			}
		}
		$entities = $this->EntityTechnician->Entity->find('list');
		$this->set(compact('entities'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid entity technician', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EntityTechnician->save($this->data)) {
				$this->Session->setFlash(__('The entity technician has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity technician could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EntityTechnician->read(null, $id);
		}
		$entities = $this->EntityTechnician->Entity->find('list');
		$this->set(compact('entities'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for entity technician', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EntityTechnician->delete($id)) {
			$this->Session->setFlash(__('Entity technician deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Entity technician was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
