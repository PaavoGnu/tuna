<?php
class ServiceOrderStepsController extends AppController {

	var $name = 'ServiceOrderSteps';

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service order step', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceOrderStep', $this->ServiceOrderStep->read(null, $id));
	}

	function add($serviceOrderId = null) {
		if (!empty($this->data)) {
			$this->ServiceOrderStep->create();
			if ($this->ServiceOrderStep->save($this->data)) {
				$this->Session->setFlash(__('The service order step has been saved', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $this->data['ServiceOrderStep']['service_order_id']));
			} else {
				$this->Session->setFlash(__('The service order step could not be saved. Please, try again.', true));
			}
		}
		$serviceOrders = $this->ServiceOrderStep->ServiceOrder->find('list');
		$entityTechnicians = $this->ServiceOrderStep->EntityTechnician->find('list');
		$serviceOrderStepTypes = $this->ServiceOrderStep->ServiceOrderStepType->find('list');
		$serviceOrderStepOpeningUsers = $this->ServiceOrderStep->ServiceOrderStepOpeningUser->find('list');
		$this->set(compact('serviceOrderId', 'serviceOrders', 'entityTechnicians', 'serviceOrderStepTypes', 'serviceOrderStepExecutionTypes', 
			'serviceOrderStepOpeningUsers'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order step', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrderStep->save($this->data)) {
				$this->Session->setFlash(__('The service order step has been saved', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $this->data['ServiceOrderStep']['service_order_id']));
			} else {
				$this->Session->setFlash(__('The service order step could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrderStep->read(null, $id);
		}
		$serviceOrders = $this->ServiceOrderStep->ServiceOrder->find('list');
		$entityTechnicians = $this->ServiceOrderStep->EntityTechnician->find('list');
		$serviceOrderStepTypes = $this->ServiceOrderStep->ServiceOrderStepType->find('list');
		$serviceOrderStepOpeningUsers = $this->ServiceOrderStep->ServiceOrderStepOpeningUser->find('list');
		$this->set(compact('serviceOrderId', 'serviceOrders', 'entityTechnicians', 'serviceOrderStepTypes', 'serviceOrderStepExecutionTypes', 
			'serviceOrderStepOpeningUsers'));
	}

	function close($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order step', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrderStep->save($this->data)) {
				$this->Session->setFlash(__('The service order step has been saved', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $this->data['ServiceOrderStep']['service_order_id']));
			} else {
				$this->Session->setFlash(__('The service order step could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrderStep->read(null, $id);
		}
		$serviceOrders = $this->ServiceOrderStep->ServiceOrder->find('list');
		$serviceOrderStepCloseUsers = $this->ServiceOrderStep->ServiceOrderStepCloseUser->find('list');
		$this->set(compact('serviceOrderId', 'serviceOrders', 'serviceOrderStepCloseUsers'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service order step', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->data = $this->ServiceOrderStep->read(null, $id);
			$serviceOrderId = $this->data['ServiceOrderStep']['service_order_id'];
		}
		if ($this->ServiceOrderStep->delete($id)) {
			$this->Session->setFlash(__('Service order step deleted', true));
			$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $serviceOrderId));
		}
		$this->Session->setFlash(__('Service order step was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>