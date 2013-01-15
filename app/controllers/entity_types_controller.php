<?php
class EntityTypesController extends AppController {

	var $name = 'EntityTypes';

	function index() {
		parent::index();
		
		$this->EntityType->recursive = 0;
		$this->set('entityTypes', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
		
		$parents = $this->EntityType->ParentEntityType->find('list');
		$this->set(compact('parents'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid entity type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('entityType', $this->EntityType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EntityType->create();
			if ($this->EntityType->save($this->data)) {
				$this->Session->setFlash(__('The entity type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity type could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->EntityType->ParentEntityType->find('list');
		$this->set(compact('parents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid entity type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EntityType->save($this->data)) {
				$this->Session->setFlash(__('The entity type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EntityType->read(null, $id);
		}
		$parents = $this->EntityType->ParentEntityType->find('list');
		$this->set(compact('parents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for entity type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EntityType->delete($id)) {
			$this->Session->setFlash(__('Entity type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Entity type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	function admin_index() {
		$this->EntityType->recursive = 0;
		$this->set('entityTypes', $this->paginate());
	}

}
?>
