<?php
class StockMovimentItemsController extends AppController {

	var $name = 'StockMovimentItems';

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stock moviment item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stockMovimentItem', $this->StockMovimentItem->read(null, $id));
	}

	function add($stockMovimentId = null) {
		if (!empty($this->data)) {
			$this->data['StockMovimentItem']['user_id'] = $this->Auth->user('id');
			$this->data['StockMovimentItem']['stock_moviment_item_date'] = date('Y-m-d H:i:s');
			$this->StockMovimentItem->create();
			
			if ($this->StockMovimentItem->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment item has been saved', true));
				$this->redirect(array('controller' => 'stock_moviments', 'action' => 'view', $this->data['StockMovimentItem']['stock_moviment_id']));
			} else {
				$this->Session->setFlash(__('The stock moviment item could not be saved. Please, try again.', true));
			}
		}
		$stockMovimentTypes = $this->StockMovimentItem->StockMovimentType->find('list');
		$productTypes = $this->StockMovimentItem->ProductType->find('list');
		$products = array();
		$measureUnits = $this->StockMovimentItem->MeasureUnit->find('list');
		$this->set(compact('stockMovimentId', 'stockMovimentTypes', 'productTypes', 'productBrands', 'products', 'measureUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stock moviment item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			$this->data['StockMovimentItem']['user_id'] = $this->Auth->user('id');
			$this->data['StockMovimentItem']['stock_moviment_item_date'] = date('Y-m-d H:i:s');
			
			if ($this->StockMovimentItem->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment item has been saved', true));
				$this->redirect(array('controller' => 'stock_moviments', 'action' => 'view', $this->data['StockMovimentItem']['stock_moviment_id']));
			} else {
				$this->Session->setFlash(__('The stock moviment item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StockMovimentItem->read(null, $id);
		}
		$stockMovimentTypes = $this->StockMovimentItem->StockMovimentType->find('list');
		$productTypes = $this->StockMovimentItem->ProductType->find('list');
		$products = $this->StockMovimentItem->Product->find('list');
		$measureUnits = $this->StockMovimentItem->MeasureUnit->find('list');
		$this->set(compact('stockMovimentTypes', 'productTypes', 'productBrands', 'products', 'measureUnits'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stock moviment item', true));
			$this->redirect(array('action'=>'index'));
		} else {
			$this->data = $this->StockMovimentItem->read(null, $id);
			$stockMovimentId = $this->data['StockMovimentItem']['stock_moviment_id'];
		}
		if ($this->StockMovimentItem->delete($id)) {
			$this->Session->setFlash(__('Stock moviment item deleted', true));
			$this->redirect(array('controller' => 'stock_moviments', 'action' => 'view', $stockMovimentId));
		}
		$this->Session->setFlash(__('Stock moviment item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function getProduct() {
		$this->autoRender = false;
		
		if ( $this->RequestHandler->isAjax() ) {
		   Configure::write ( 'debug', 0 );
		}

		$products = $this->StockMovimentItem->Product->find('list', array('conditions' =>
			'Product.id in (SELECT id FROM products WHERE product_type_id = ' . 
				$_POST['data']['StockMovimentItem']['product_type_id'] . ')', 'order' => 'Product.product_structure'));
		
		echo '<option value=""></option>';
		
		foreach($products as $k => $v) :
			echo '<option value="'.$k.'">'.$v.'</option>';
		endforeach;
	}
}
?>