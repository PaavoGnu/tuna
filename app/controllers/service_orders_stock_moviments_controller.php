<?php
class ServiceOrdersStockMovimentsController extends AppController {

	var $name = 'ServiceOrdersStockMoviments';
	
	function add($serviceOrderId = null) {
		if (!empty($this->data)) {
			$this->ServiceOrdersStockMoviment->StockMoviment->create();
			
			$stockMovimentData['StockMoviment']['enterprise_id'] = $this->data['ServiceOrdersStockMoviment']['enterprise_id'];
			$stockMovimentData['StockMoviment']['enterprise_unit_id'] = $this->data['ServiceOrdersStockMoviment']['enterprise_unit_id'];
			$stockMovimentData['StockMoviment']['stock_id'] = $this->data['ServiceOrdersStockMoviment']['stock_id'];
			$stockMovimentData['StockMoviment']['stock_moviment_type_id'] = $this->data['ServiceOrdersStockMoviment']['stock_moviment_type_id'];
			$stockMovimentData['StockMoviment']['stock_moviment_date'] = $this->data['ServiceOrdersStockMoviment']['stock_moviment_date'];
			$stockMovimentData['StockMoviment']['user_id'] = $this->Auth->user('id');
			$stockMovimentData['StockMoviment']['stock_moviment_description'] = $this->data['ServiceOrdersStockMoviment']['stock_moviment_description'];
			
			$this->ServiceOrdersStockMoviment->StockMoviment->save($stockMovimentData);
			$this->ServiceOrdersStockMoviment->create();
			
			$serviceOrdersStockMovimentData['ServiceOrdersStockMoviment']['stock_moviment_id'] = $this->ServiceOrdersStockMoviment->StockMoviment->id;
			$serviceOrdersStockMovimentData['ServiceOrdersStockMoviment']['service_order_id'] = $this->data['ServiceOrdersStockMoviment']['service_order_id'];
						
			if ($this->ServiceOrdersStockMoviment->save($serviceOrdersStockMovimentData)) {
				$this->Session->setFlash(__('The stock moviment has been saved', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $this->data['ServiceOrdersStockMoviment']['service_order_id']));
			} else {
				$this->Session->setFlash(__('The stock moviment could not be saved. Please, try again.', true));
			}
		}
		
		$enterprises = $this->ServiceOrdersStockMoviment->Enterprise->find('list');
		$enterpriseUnits = array();
		$stocks = array();
		$stockMovimentTypes = $this->ServiceOrdersStockMoviment->StockMovimentType->find('list');
		$serviceOrders = $this->ServiceOrdersStockMoviment->ServiceOrder->find('list');
		
		$this->set(compact('serviceOrderId', 'enterprises', 'enterprise_units', 'stocks', 'stockMovimentTypes', 'serviceOrders'));
	}

	function delete($serviceOrderId = null, $stockMovimentId = null) {
		if ((!$serviceOrderId) or (!$stockMovimentId)) {
			$this->Session->setFlash(__('Invalid id for stock moviment', true));
			$this->redirect(array('action'=>'index'));
		} else {
			if ($this->ServiceOrdersStockMoviment->StockMoviment->delete($stockMovimentId)) {
				$this->Session->setFlash(__('Stock moviment deleted', true));
				$this->redirect(array('controller' => 'service_orders', 'action' => 'view', $serviceOrderId));
			} else {
			  $this->Session->setFlash(__('Stock moviment was not deleted', true));
			  $this->redirect(array('controller' => 'service_orders', 'action' => 'view', $serviceOrderId));
			}
		}
	}
	
  	function getEnterpriseUnit() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$enterpriseUnits = $this->ServiceOrdersStockMoviment->EnterpriseUnit->find('list', array('conditions' =>
			'EnterpriseUnit.id in (SELECT enterprise_unit_id FROM enterprises_enterprise_units
				WHERE enterprise_id = '.$_POST['data']['ServiceOrdersStockMoviment']['enterprise_id'].')', 'order' => 'EnterpriseUnit.enterprise_unit_structure'));
				
		echo '<option value=""></option>';
		
		foreach($enterpriseUnits as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
	
	function getStock() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$stocks = $this->ServiceOrdersStockMoviment->Stock->find('list', array('conditions' =>
			'Stock.id in (SELECT stock_id FROM enterprise_units_stocks
				WHERE enterprise_unit_id = '.$_POST['data']['ServiceOrdersStockMoviment']['enterprise_unit_id'].')', 'order' => 'Stock.stock_name'));
		
		echo '<option value=""></option>';
		
		foreach($stocks as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>
