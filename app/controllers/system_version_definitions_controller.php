<?php
class SystemVersionDefinitionsController extends AppController {

	var $name = 'SystemVersionDefinitions';

	function index() {
		$this->SystemVersionDefinition->recursive = 0;
		$this->set('systemVersionDefinitions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid system version definition', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('systemVersionDefinition', $this->SystemVersionDefinition->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SystemVersionDefinition->create();
			if ($this->SystemVersionDefinition->save($this->data)) {
				$this->Session->setFlash(__('The system version definition has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system version definition could not be saved. Please, try again.', true));
			}
		}
		$systemVersions = $this->SystemVersionDefinition->SystemVersion->find('list');
		$enterprises = $this->SystemVersionDefinition->Enterprise->find('list');
		$systemVersionDefinitions = $this->SystemVersionDefinition->SystemVersionDefinition->find('list');
		$this->set(compact('systemVersions', 'enterprises', 'systemVersionDefinitions'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid system version definition', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SystemVersionDefinition->save($this->data)) {
				$this->Session->setFlash(__('The system version definition has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system version definition could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SystemVersionDefinition->read(null, $id);
		}
		$systemVersions = $this->SystemVersionDefinition->SystemVersion->find('list');
		$enterprises = $this->SystemVersionDefinition->Enterprise->find('list');
		$systemVersionDefinitions = $this->SystemVersionDefinition->SystemVersionDefinition->find('list');
		$this->set(compact('systemVersions', 'enterprises', 'systemVersionDefinitions'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for system version definition', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SystemVersionDefinition->delete($id)) {
			$this->Session->setFlash(__('System version definition deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('System version definition was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>