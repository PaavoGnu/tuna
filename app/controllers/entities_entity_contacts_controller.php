<?php
class EntitiesEntityContactsController extends AppController {

	var $name = 'EntitiesEntityContacts';
	
	function add($entityId = null, $entityContactId = null) {
		if (!empty($this->data)) {
			$this->EntitiesEntityContact->create();
			if ($this->EntitiesEntityContact->save($this->data)) {
				$this->Session->setFlash(__('The entity contact has been saved', true));
				$this->redirect(array('controller' => 'entities', 'action' => 'view', $this->data['EntitiesEntityContact']['entity_id']));
			} else {
				$this->Session->setFlash(__('The entity contact could not be saved. Please, try again.', true));
			}
		}
		
		$entities = $this->EntitiesEntityContact->Entity->find('list');
		$entityContacts = $this->EntitiesEntityContact->EntityContact->find('list');
		
		$this->set(compact('entityId', 'entityContactId', 'entities', 'entityContacts'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for entity contact', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->data = $this->EntitiesEntityContact->read(null, $id);
			$entityId = $this->data['EntitiesEntityContact']['entity_id'];
		}
		
		if ($this->EntitiesEntityContact->delete($id)) {
			$this->Session->setFlash(__('Entity contact deleted', true));
			$this->redirect(array('controller' => 'entities', 'action' => 'view', $entityId));
		}
		$this->Session->setFlash(__('Entity contact was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
