<?php
class EntitiesEntityGroupsController extends AppController {

	var $name = 'EntitiesEntityGroups';
	
	function add($entityId = null, $entityGroupId = null) {
		if (!empty($this->data)) {
			$this->EntitiesEntityGroup->create();
			if ($this->EntitiesEntityGroup->save($this->data)) {
				$this->Session->setFlash(__('The entity group has been saved', true));
				$this->redirect(array('controller' => 'entities', 'action' => 'view', $this->data['EntitiesEntityGroup']['entity_id']));
			} else {
				$this->Session->setFlash(__('The entity group could not be saved. Please, try again.', true));
			}
		}
		
		$entities = $this->EntitiesEntityGroup->Entity->find('list');
		$entityGroups = $this->EntitiesEntityGroup->EntityGroup->find('list');
		
		$this->set(compact('entityId', 'entityGroupId', 'entities', 'entityGroups'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for entity group', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->data = $this->EntitiesEntityGroup->read(null, $id);
			$entityId = $this->data['EntitiesEntityGroup']['entity_id'];
		}
		
		if ($this->EntitiesEntityGroup->delete($id)) {
			$this->Session->setFlash(__('Entity group deleted', true));
			$this->redirect(array('controller' => 'entities', 'action' => 'view', $entityId));
		}
		$this->Session->setFlash(__('Entity group was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
