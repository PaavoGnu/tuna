<?php
class EntityProductsController extends AppController {

	var $name = 'EntityProducts';

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid entity product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('entityProduct', $this->EntityProduct->read(null, $id));
	}

	function add($entityId = null) {
		if (!empty($this->data)) {
			$this->EntityProduct->create();
			if ($this->EntityProduct->save($this->data)) {
				$this->Session->setFlash(__('The entity product has been saved', true));
				$this->redirect(array('action' => 'index'));
				$this->redirect(array('controller' => 'entities', 'action' => 'view', $this->data['EntityProduct']['entity_id']));
			} else {
				$this->Session->setFlash(__('The entity product could not be saved. Please, try again.', true));
			}
		}
		$
		$entities = $this->EntityProduct->Entity->find('list');
		$products = $this->EntityProduct->Product->find('list');
		$measureUnits = $this->EntityProduct->MeasureUnit->find('list');
		$this->set(compact('entityId', 'entities', 'products', 'measureUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid entity product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EntityProduct->save($this->data)) {
				$this->Session->setFlash(__('The entity product has been saved', true));
				$this->redirect(array('controller' => 'entities', 'action' => 'view', $this->data['EntityProduct']['entity_id']));
			} else {
				$this->Session->setFlash(__('The entity product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EntityProduct->read(null, $id);
		}
		$entities = $this->EntityProduct->Entity->find('list');
		$products = $this->EntityProduct->Product->find('list');
		$measureUnits = $this->EntityProduct->MeasureUnit->find('list');
		$this->set(compact('entities', 'products', 'measureUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for entity product', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EntityProduct->delete($id)) {
			$this->Session->setFlash(__('Entity product deleted', true));
			$this->redirect(array('controller' => 'entities', 'action' => 'view',
				$entityProducts['EntityProduct']['entity_id']));
		}
		$this->Session->setFlash(__('Entity product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>