<?php
class EntitiesController extends AppController {

	var $name = 'Entities';

	function index() {
		parent::index();
	
		$this->Entity->recursive = 0;
		$this->set('entities', $this->paginate()); 
	}
	
	function indexFilter() {
		parent::indexFilter();
		
		$entityTypes = $this->Entity->EntityType->find('list');
		$this->set(compact('entityTypes'));
	}
	
	function view($id = null) {
		$this->Entity->recursive = 2;
		
		if (!$id) {
			$this->Session->setFlash(__('Invalid entity', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('entity', $this->Entity->read(null, $id));
		
		$entityGroups = $this->Entity->EntityGroup->find('list');
		$this->set(compact('entityGroups'));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Entity->create();
			if ($this->Entity->save($this->data)) {
				$this->Session->setFlash(__('The entity has been saved', true));
				$this->redirect(array('action' => 'view', $this->Entity->id));
			} else {
				$this->Session->setFlash(__('The entity could not be saved. Please, try again.', true));
			}
		}
		$entityTypes = $this->Entity->EntityType->find('list');
		$this->set(compact('entityTypes'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid entity', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Entity->save($this->data)) {
				$this->Session->setFlash(__('The entity has been saved', true));
				$this->redirect(array('action' => 'view', $this->Entity->id));
			} else {
				$this->Session->setFlash(__('The entity could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Entity->read(null, $id);
		}
		$entityTypes = $this->Entity->EntityType->find('list');
		$this->set(compact('entityTypes'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for entity', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Entity->delete($id)) {
			$this->Session->setFlash(__('Entity deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Entity was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
