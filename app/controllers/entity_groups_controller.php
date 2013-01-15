<?php
class EntityGroupsController extends AppController {

	var $name = 'EntityGroups';

	function index() {		
		parent::index();
		
		$this->EntityGroup->recursive = 0;
		$this->set('entityGroups', $this->paginate());		
	}
	
	function indexFilter() {
		$parents = $this->EntityGroup->ParentEntityGroup->find('list');
		$this->set(compact('parents'));	
		
		parent::indexFilter();
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid entity group', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('entityGroup', $this->EntityGroup->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->EntityGroup->create();
			if ($this->EntityGroup->save($this->data)) {
				$this->Session->setFlash(__('The entity group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity group could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->EntityGroup->ParentEntityGroup->find('list');
		$this->set(compact('parents'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid entity group', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->EntityGroup->save($this->data)) {
				$this->Session->setFlash(__('The entity group has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The entity group could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->EntityGroup->read(null, $id);
		}
		$parents = $this->EntityGroup->ParentEntityGroup->find('list');
		$this->set(compact('parents'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for entity group', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->EntityGroup->delete($id)) {
			$this->Session->setFlash(__('Entity group deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Entity group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
