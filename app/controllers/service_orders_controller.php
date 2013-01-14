<?php
class ServiceOrdersController extends AppController {

	var $name = 'ServiceOrders';

	function index($filter = null) {
		$this->ServiceOrder->recursive = 0;
		
		switch($filter) {
			case 'opened':
				$this->paginate = array(
					'conditions' => $this->ServiceOrder->getOpenedConditions(),
					'order' => $this->ServiceOrder->getOrder());
				break;
				
			case 'routed':
				$this->paginate = array(
					'conditions' => $this->ServiceOrder->getRoutedConditions(),
					'order' => $this->ServiceOrder->getOrder());
				break;
				
			case 'canceled':
				$this->paginate = array(
					'conditions' => $this->ServiceOrder->getCanceledConditions(),
					'order' => $this->ServiceOrder->getOrder());
				break;
				
			case 'closed':
				$this->paginate = array(
					'conditions' => $this->ServiceOrder->getClosedConditions(),
					'order' => $this->ServiceOrder->getOrder());
				break;
				
			case 'evaluated':
				$this->paginate = array(
					'conditions' => $this->ServiceOrder->getEvaluatedConditions(),
					'order' => $this->ServiceOrder->getOrder());
				break;
				
			default:
				$this->paginate = array(
					'order' => $this->ServiceOrder->getOrder());
				break;
		}
		
		$countAll = $this->ServiceOrder->countAll();
		$countOpened = $this->ServiceOrder->countOpened();
		$countRouted = $this->ServiceOrder->countRouted();
		$countCanceled = $this->ServiceOrder->countCanceled();
		$countClosed = $this->ServiceOrder->countClosed();
		$countEvaluated = $this->ServiceOrder->countEvaluated();
		
		$this->set('serviceOrders', $this->paginate('ServiceOrder'));
		$this->set(compact('filter', 'countAll', 'countOpened', 'countRouted', 'countCanceled', 'countClosed', 'countEvaluated'));
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceOrder', $this->ServiceOrder->read(null, $id));
	}
	
	function quickView() {
		if (!empty($this->data)) {
			$this->redirect(array('action' => 'view', $this->data['ServiceOrder']['id']));
		}
	}
	
	function viewEntryReceipt($id = null) {
		//if (!$id) {
		//	$this->Session->setFlash(__('Invalid service order', true));
		//	$this->redirect(array('action' => 'index'));
		//} else {
		//	$this->data = $this->ServiceOrder->read(null, $id);
		//}
		//$enterprises = $this->ServiceOrder->Enterprise->find('list');
		//$entities = $this->ServiceOrder->Entity->find('list');
		//$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		//$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list');
		//$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		//$this->set(compact('enterprises', 'entities', 'serviceOrderTypes', 'entityTechnicians', 'serviceOrderOpeningUsers'));
		
		$this->layout = 'pdf';
		$this->render();
	}

	function add() {
		if (!empty($this->data)) {
			$this->ServiceOrder->create();
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));				
				$this->redirect(array('action' => 'view', $this->ServiceOrder->id));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$entityGroups = $this->ServiceOrder->EntityGroup->find('list', array('order' => 'EntityGroup.entity_group_structure'));
		$entities = array();
		$serviceOrderPriorities = $this->ServiceOrder->ServiceOrderPriority->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		$this->set(compact('enterprises', 'entityGroups', 'entities', 'serviceOrderPriorities', 'serviceOrderTypes',
			'entityTechnicians', 'serviceOrderOpeningUsers'));
	}

	function getEntity() {
		$this->autoRender = false;
		// set the debug level to 0
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$entities = $this->ServiceOrder->Entity->find('list', array('conditions' =>
			'Entity.id in (SELECT entity_id FROM entities_entity_groups
				WHERE entity_group_id = '.$_POST['data']['ServiceOrder']['entity_group_id'].')', 'order' => 'Entity.entity_name'));
		
		foreach($entities AS $k=>$v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$entityGroups = $this->ServiceOrder->EntityGroup->find('list');
		$entities = $this->ServiceOrder->Entity->find('list');
		$serviceOrderPriorities = $this->ServiceOrder->ServiceOrderPriority->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		$this->set(compact('enterprises', 'entityGroups', 'entities', 'serviceOrderPriorities', 'serviceOrderTypes',
			'entityTechnicians', 'serviceOrderOpeningUsers'));
	}
	
	function route($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$entities = $this->ServiceOrder->Entity->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		$serviceOrderRoutingUsers = $this->ServiceOrder->ServiceOrderRoutingUser->find('list');
		$this->set(compact('enterprises', 'entities', 'serviceOrderTypes', 'entityTechnicians', 'serviceOrderOpeningUsers',
			'serviceOrderRoutingUsers'));
	}

	function cancel($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$entities = $this->ServiceOrder->Entity->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		$serviceOrderRoutingUsers = $this->ServiceOrder->ServiceOrderRoutingUser->find('list');
		$serviceOrderCancellationUsers = $this->ServiceOrder->ServiceOrderCancellationUser->find('list');
		$this->set(compact('enterprises', 'entities', 'serviceOrderTypes', 'entityTechnicians', 'serviceOrderOpeningUsers',
			'serviceOrderRoutingUsers', 'serviceOrderCancellationUsers'));
	}
	
	function close($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$serviceOrder = $this->ServiceOrder->read(null, $id);
			
			if (is_null($serviceOrder['ServiceOrder']['service_order_routing_date'])) {
				$this->Session->setFlash(__('Ordem de serviço não encaminhada, favor encaminhar antes do encerramento.', true));
				$this->redirect(array('action' => 'index'));
			}
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$entities = $this->ServiceOrder->Entity->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		$serviceOrderRoutingUsers = $this->ServiceOrder->ServiceOrderRoutingUser->find('list');
		$serviceOrderCancellationUsers = $this->ServiceOrder->ServiceOrderCancellationUser->find('list');
		$serviceOrderCloseUsers = $this->ServiceOrder->ServiceOrderCloseUser->find('list');
		$this->set(compact('enterprises', 'entities', 'serviceOrderTypes', 'entityTechnicians', 'serviceOrderOpeningUsers',
			'serviceOrderRoutingUsers', 'serviceOrderCancellationUsers', 'serviceOrderCloseUsers'));
	}
	
	function evaluate($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$entityGroups = $this->ServiceOrder->EntityGroup->find('list');
		$entities = $this->ServiceOrder->Entity->find('list');
		$serviceOrderPriorities = $this->ServiceOrder->ServiceOrderPriority->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		$this->set(compact('enterprises', 'entityGroups', 'entities', 'serviceOrderPriorities', 'serviceOrderTypes',
			'entityTechnicians', 'serviceOrderOpeningUsers'));
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service order', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ServiceOrder->delete($id)) {
			$this->Session->setFlash(__('Service order deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Service order was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
