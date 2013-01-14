<?php
class EntitiesProductsController extends AppController {

	var $name = 'EntitiesProducts';

	function index() {
		$this->EntitiesProduct->recursive = 0;
		$this->set('entitiesProducts', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid entities product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('entitiesProduct', $this->EntitiesProduct->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EntitiesProduct->create();
			if ($this->EntitiesProduct->save($this->data)) {
				$this->Session->setFlash(__('The entities product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entities product could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid entities product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EntitiesProduct->save($this->data)) {
				$this->Session->setFlash(__('The entities product has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entities product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EntitiesProduct->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for entities product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EntitiesProduct->delete($id)) {
			$this->Session->setFlash(__('Entities product deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Entities product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>