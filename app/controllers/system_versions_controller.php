<?php
class SystemVersionsController extends AppController {

	var $name = 'SystemVersions';

	function index() {
		$this->SystemVersion->recursive = 0;
		$this->set('systemVersions', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid system version', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('systemVersion', $this->SystemVersion->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->SystemVersion->create();
			if ($this->SystemVersion->save($this->data)) {
				$this->Session->setFlash(__('The system version has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system version could not be saved. Please, try again.', true));
			}
		}
		$systems = $this->SystemVersion->System->find('list');
		$enterprises = $this->SystemVersion->Enterprise->find('list');
		$this->set(compact('systems', 'enterprises'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid system version', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->SystemVersion->save($this->data)) {
				$this->Session->setFlash(__('The system version has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The system version could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->SystemVersion->read(null, $id);
		}
		$systems = $this->SystemVersion->System->find('list');
		$enterprises = $this->SystemVersion->Enterprise->find('list');
		$this->set(compact('systems', 'enterprises'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for system version', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->SystemVersion->delete($id)) {
			$this->Session->setFlash(__('System version deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('System version was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>