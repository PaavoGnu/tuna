<?php
class ServiceOrdersController extends AppController {

	var $name = 'ServiceOrders';

	function index($filter = null) {
				
		if (isset($filter)) {
			switch($filter) {
				case 'opened':
					$this->paginate = array(
						'conditions' => $this->ServiceOrder->getOpenedConditions()
						);
					break;
				
				case 'routed':
					$this->paginate = array(
						'conditions' => $this->ServiceOrder->getRoutedConditions()
						);
					break;
				
				case 'positioned':
					$this->paginate = array(
						'conditions' => $this->ServiceOrder->getPositionedConditions()
						);
					break;
			
				case 'canceled':
					$this->paginate = array(
						'conditions' => $this->ServiceOrder->getCanceledConditions()
						);
					break;
				
				case 'closed':
					$this->paginate = array(
						'conditions' => $this->ServiceOrder->getClosedConditions()
						);
					break;
				
				case 'evaluated':
					$this->paginate = array(
						'conditions' => $this->ServiceOrder->getEvaluatedConditions()
						);
					break;
			}
		} else {
			parent::index();
		}
		
		$this->ServiceOrder->recursive = 0;		
	
		$countAll = $this->ServiceOrder->countAll();
		$countOpened = $this->ServiceOrder->countOpened();
		$countRouted = $this->ServiceOrder->countRouted();
		$countPositioned = $this->ServiceOrder->countPositioned();
		$countCanceled = $this->ServiceOrder->countCanceled();
		$countClosed = $this->ServiceOrder->countClosed();
		$countEvaluated = $this->ServiceOrder->countEvaluated();
		
		$this->set('serviceOrders', $this->paginate());
		$this->set(compact('filter', 'countAll', 'countOpened', 'countRouted', 'countPositioned', 'countCanceled', 'countClosed', 'countEvaluated'));
	}

	function indexFilter() {
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$enterpriseUnits = $this->ServiceOrder->EnterpriseUnit->find('list');
		$entityGroups = $this->ServiceOrder->EntityGroup->find('list');
		$entities = array();
		$entityContacts = array();
		$serviceOrderPriorityTypes = $this->ServiceOrder->ServiceOrderPriorityType->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list');
		
		$serviceOrderEvaluationEntityGroups = $this->ServiceOrder->ServiceOrderEvaluationEntityGroup->find('list');
		$serviceOrderEvaluationEntities = array();
		$serviceOrderEvaluationTypes = $this->ServiceOrder->ServiceOrderEvaluationType->find('list');
			
		$this->set(compact('enterprises', 'enterpriseUnits', 'entityGroups', 'entities', 'entityContacts',
			'serviceOrderPriorityTypes', 'serviceOrderTypes', 'entityTechnicians', 'serviceOrderOpeningUsers',
			'serviceOrderEvaluationEntityGroups', 'serviceOrderEvaluationEntities', 'serviceOrderEvaluationTypes'
			));
			
		parent::indexFilter();
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceOrder', $this->ServiceOrder->read(null, $id));
		
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list');
		$serviceOrderStepTypes= $this->ServiceOrder->ServiceOrderStep->ServiceOrderStepType->find('list');
		
		$this->set(compact('entityTechnicians', 'serviceOrderStepTypes'));
	}
	
	function quickView() {
		if (!empty($this->data)) {
			$this->redirect(array('action' => 'view', $this->data['ServiceOrder']['id']));
		}
	}
	
	function pdfServiceOrder($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		}
		
		$this->set('serviceOrder', $this->ServiceOrder->read(null, $id));
		
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list');
		$serviceOrderStepTypes= $this->ServiceOrder->ServiceOrderStepType->find('list');
		
		$this->layout = 'pdf';
		$this->render();
	}

	function add() {
		if (!empty($this->data)) {
			$this->data['ServiceOrder']['service_order_opening_user_id'] = $this->Auth->user('id');
			$this->ServiceOrder->create();
			
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));				
				$this->redirect(array('action' => 'view', $this->ServiceOrder->id));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$enterpriseUnits = $this->ServiceOrder->EnterpriseUnit->find('list');
		$entityGroups = $this->ServiceOrder->EntityGroup->find('list');
		$entities = array();
		$entityContacts = array();
		$serviceOrderPriorityTypes = $this->ServiceOrder->ServiceOrderPriorityType->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		$this->set(compact('enterprises', 'enterpriseUnits', 'entityGroups', 'entities', 'entityContacts',
			'serviceOrderPriorityTypes', 'serviceOrderTypes', 'entityTechnicians', 'serviceOrderOpeningUsers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$serviceOrder = $this->ServiceOrder->read(null, $id);
			
			if (!is_null($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) {
				$this->Session->setFlash(__('Ordem de serviço cancelada, edição não permitida.', true));
				$this->redirect(array('action' => 'view', $id));
			}
		}
		
		if (!empty($this->data)) {
			$this->data['ServiceOrder']['service_order_opening_user_id'] = $this->Auth->user('id');
			
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$enterprises = $this->ServiceOrder->Enterprise->find('list');
		$enterpriseUnits = $this->ServiceOrder->EnterpriseUnit->find('list');
		$entityGroups = $this->ServiceOrder->EntityGroup->find('list');
		$entities = $this->ServiceOrder->Entity->find('list');
		$entityContacts = $this->ServiceOrder->EntityContact->find('list');
		$serviceOrderPriorityTypes = $this->ServiceOrder->ServiceOrderPriorityType->find('list');
		$serviceOrderTypes = $this->ServiceOrder->ServiceOrderType->find('list');
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderOpeningUsers = $this->ServiceOrder->ServiceOrderOpeningUser->find('list');
		$this->set(compact('enterprises', 'enterpriseUnits', 'entityGroups', 'entities', 'entityContacts',
			'serviceOrderPriorityTypes', 'serviceOrderTypes', 'entityTechnicians', 'serviceOrderOpeningUsers'));
	}
	
	function route($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$serviceOrder = $this->ServiceOrder->read(null, $id);
			
			if (!is_null($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) {
				$this->Session->setFlash(__('Ordem de serviço cancelada, encaminhamento não permitido.', true));
				$this->redirect(array('action' => 'view', $id));
			}
		}

		if (!empty($this->data)) {
			$this->data['ServiceOrder']['service_order_routing_user_id'] = $this->Auth->user('id');
			
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}			
		}
		
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$entityTechnicians = $this->ServiceOrder->EntityTechnician->find('list', array('conditions' =>
			array('entity_technician_enabled' => true)));
		$serviceOrderRoutingUsers = $this->ServiceOrder->ServiceOrderRoutingUser->find('list');
		$this->set(compact('entityTechnicians', 'serviceOrderRoutingUsers'));
	}

	function cancel($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$serviceOrder = $this->ServiceOrder->read(null, $id);
					
			if (!is_null($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) {
				$this->Session->setFlash(__('Ordem de serviço já cancelada.', true));
				$this->redirect(array('action' => 'view', $id));
			}
		}

		if (!empty($this->data)) {
			$this->data['ServiceOrder']['service_order_cancellation_user_id'] = $this->Auth->user('id');
			
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$serviceOrderCancellationUsers = $this->ServiceOrder->ServiceOrderCancellationUser->find('list');
		$this->set(compact('serviceOrderCancellationUsers'));
	}
	
	function close($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$serviceOrder = $this->ServiceOrder->read(null, $id);
			
			if (is_null($serviceOrder['ServiceOrder']['service_order_routing_date'])) {
				$this->Session->setFlash(__('Ordem de serviço não encaminhada, favor encaminhar antes do encerramento.', true));
				$this->redirect(array('action' => 'view', $id));
			}
			
			if (!is_null($serviceOrder['ServiceOrder']['service_order_cancellation_date'])) {
				$this->Session->setFlash(__('Ordem de serviço cancelada, encerramento não permitido.', true));
				$this->redirect(array('action' => 'view', $id));
			}
		}
		if (!empty($this->data)) {
			$this->data['ServiceOrder']['service_order_close_user_id'] = $this->Auth->user('id');
			
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		$serviceOrderCloseUsers = $this->ServiceOrder->ServiceOrderCloseUser->find('list');
		$this->set(compact('serviceOrderCloseUsers'));
	}
	
	function evaluate($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order', true));
			$this->redirect(array('action' => 'index'));
		} else {
			$serviceOrder = $this->ServiceOrder->read(null, $id);
			
			if (is_null($serviceOrder['ServiceOrder']['service_order_close_date'])) {
				$this->Session->setFlash(__('Ordem de serviço não encerrada, favor encerrar antes da avaliação.', true));
				$this->redirect(array('action' => 'view', $id));
			}
		}
		
		if (!empty($this->data)) {
			$this->data['ServiceOrder']['service_order_evaluation_user_id'] = $this->Auth->user('id');
			
			if ($this->ServiceOrder->save($this->data)) {
				$this->Session->setFlash(__('The service order has been saved', true));
				$this->redirect(array('action' => 'view', $id));
			} else {
				$this->Session->setFlash(__('The service order could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrder->read(null, $id);
		}
		
		$serviceOrderEvaluationEntityGroups = $this->ServiceOrder->ServiceOrderEvaluationEntityGroup->find('list');
		$serviceOrderEvaluationEntities = array();
		$serviceOrderEvaluationTypes = $this->ServiceOrder->ServiceOrderEvaluationType->find('list');
		$this->set(compact('serviceOrderEvaluationEntityGroups', 'serviceOrderEvaluationEntities',
			'serviceOrderEvaluationTypes'));
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
	
	function getEnterpriseUnit() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$enterpriseUnits = $this->ServiceOrder->EnterpriseUnit->find('list', array('conditions' =>
			'EnterpriseUnit.id in (SELECT enterprise_unit_id FROM enterprises_enterprise_units
				WHERE enterprise_id = '.$_POST['data']['ServiceOrder']['enterprise_id'].')', 'order' => 'EnterpriseUnit.enterprise_unit_structure'));
		
		echo '<option value=""></option>';
		
		foreach($enterpriseUnits as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
	
	function getEntity() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$entities = $this->ServiceOrder->Entity->find('list', array('conditions' =>
			'Entity.id in (SELECT entity_id FROM entities_entity_groups
				WHERE entity_group_id = '.$_POST['data']['ServiceOrder']['entity_group_id'].')', 'order' => 'Entity.entity_name'));
		
		echo '<option value=""></option>';
		
		foreach($entities as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
	
	function getEntityContact() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$entity_contacts = $this->ServiceOrder->EntityContact->find('list', array('conditions' =>
			'EntityContact.id in (SELECT entity_contact_id FROM entities_entity_contacts
				WHERE entity_id = '.$_POST['data']['ServiceOrder']['entity_id'].')', 'order' => 'EntityContact.entity_contact_name'));
		
		echo '<option value=""></option>';
		
		foreach($entity_contacts as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}

	function getEvaluationEntity() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$serviceOrderEvaluationEntities = $this->ServiceOrder->ServiceOrderEvaluationEntity->find('list', array('conditions' =>
			'ServiceOrderEvaluationEntity.id in (SELECT entity_id FROM entities_entity_groups
				WHERE entity_group_id = '.$_POST['data']['ServiceOrder']['service_order_evaluation_entity_group_id'].')', 'order' => 'ServiceOrderEvaluationEntity.entity_name'));
		
		echo '<option value=""></option>';
		
		foreach($serviceOrderEvaluationEntities as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>
