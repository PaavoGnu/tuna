<?php
class ServiceOrderProductsController extends AppController {

	var $name = 'ServiceOrderProducts';

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid service orders product', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('serviceOrderProduct', $this->ServiceOrderProduct->read(null, $id));
	}

	function add($serviceOrderId = null) {
		if (!empty($this->data)) {
			$this->ServiceOrderProduct->create();
			if ($this->ServiceOrderProduct->save($this->data)) {
				$this->Session->setFlash(__('The service order product has been saved', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $this->data['ServiceOrderProduct']['service_order_id']));
			} else {
				$this->Session->setFlash(__('The service orders product could not be saved. Please, try again.', true));
			}
		}
		$serviceOrders = $this->ServiceOrderProduct->ServiceOrder->find('list');
		$products = $this->ServiceOrderProduct->Product->find('list');
		$measureUnits = $this->ServiceOrderProduct->MeasureUnit->find('list');
		$this->set(compact('serviceOrderId', 'serviceOrders', 'products', 'measureUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ServiceOrderProduct->save($this->data)) {
				$this->Session->setFlash(__('The service order product has been saved', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $this->data['ServiceOrderProduct']['service_order_id']));
			} else {
				$this->Session->setFlash(__('The service order product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrderProduct->read(null, $id);
		}
		$serviceOrders = $this->ServiceOrderProduct->ServiceOrder->find('list');
		$products = $this->ServiceOrderProduct->Product->find('list');
		$measureUnits = $this->ServiceOrderProduct->MeasureUnit->find('list');
		$this->set(compact('serviceOrders', 'products', 'measureUnits'));
	}
	
	function stock($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid service order product', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->ServiceOrderProduct->ServiceOrder->StockMoviment->create();
			
			if (!$this->ServiceOrderProduct->ServiceOrder->StockMoviment->save($this->data['ServiceOrderProduct'])) {
				$this->Session->setFlash(__('Não foi possível gerar o movimento de estoque. Tente novamente.', true));
			} else {
				//$this->ServiceOrderProduct->ServiceOrder->ServiceOrdersStockMoviment->create();
				//s$this->ServiceOrderProduct->ServiceOrder->ServiceOrdersStockMoviment->stockMovimentId = $this->ServiceOrderProduct->ServiceOrder->StockMoviment->id;;
				
				if (!$this->ServiceOrderProduct->ServiceOrder->ServiceOrdersStockMoviment->save($this->data['ServiceOrderProduct'])) {
					$this->ServiceOrderProduct->ServiceOrder->StockMoviment->del();
					$this->Session->setFlash(__('Não foi possível vincular o movimento de estoque à ordem de serviço. Tente novamente.', true));
				}
			}
			$this->ServiceOrderProduct->ServiceOrder->StockMoviment->save($this->data['ServiceOrderProduct']);
			
			
			
			$this->ServiceOrderProduct->ServiceOrder->StockMoviment->StockMovimentItem->create();
			if ($this->ServiceOrderProduct->ServiceOrder->StockMoviment->StockMovimentItem->save($this->data)) {
				$this->Session->setFlash(__('The service order product has been saved', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $this->data['ServiceOrderProduct']['service_order_id']));
			} else {
				$this->Session->setFlash(__('The service order product could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ServiceOrderProduct->read(null, $id);
		}
		$enterprises = $this->ServiceOrderProduct->ServiceOrder->StockMoviment->Enterprise->find('list');
		$stocks = $this->ServiceOrderProduct->ServiceOrder->StockMoviment->Stock->find('list');
		$stockMovimentTypes = $this->ServiceOrderProduct->ServiceOrder->StockMoviment->StockMovimentType->find('list');
		$users = $this->ServiceOrderProduct->ServiceOrder->StockMoviment->User->find('list');
		$serviceOrders = $this->ServiceOrderProduct->ServiceOrder->find('list');
		$products = $this->ServiceOrderProduct->Product->find('list');
		$measureUnits = $this->ServiceOrderProduct->MeasureUnit->find('list');
		$this->set(compact('enterprises', 'stocks', 'stockMovimentTypes', 'users', 'serviceOrders', 'products', 'measureUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for service order product', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->data = $this->ServiceOrderProduct->read(null, $id);
			$serviceOrderId = $this->data['ServiceOrderProduct']['service_order_id'];
		}
		if ($this->ServiceOrderProduct->delete($id)) {
			$this->Session->setFlash(__('Service order product deleted', true));
			$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $serviceOrderId));
		}
		$this->Session->setFlash(__('Service order product was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>