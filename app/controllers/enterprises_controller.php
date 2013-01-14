<?php
class EnterprisesController extends AppController {

	var $name = 'Enterprises';
    
	function index() {
		$this->Enterprise->recursive = 0;
		$this->set('enterprises', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid enterprise', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('enterprise', $this->Enterprise->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Enterprise->create();
			if ($this->Enterprise->save($this->data)) {
				$this->Session->setFlash(__('The enterprise has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enterprise could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->Enterprise->ParentEnterprise->find('list');
		$entities = $this->Enterprise->Entity->find('list');
		$this->set(compact('parents', 'entities'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid enterprise', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Enterprise->save($this->data)) {
				$this->Session->setFlash(__('The enterprise has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The enterprise could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Enterprise->read(null, $id);
		}
		$parents = $this->Enterprise->ParentEnterprise->find('list');
		$entities = $this->Enterprise->Entity->find('list');
		$this->set(compact('parents', 'entities'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for enterprise', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Enterprise->delete($id)) {
			$this->Session->setFlash(__('Enterprise deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Enterprise was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
