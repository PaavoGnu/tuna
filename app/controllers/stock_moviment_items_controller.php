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
			$this->StockMovimentItem->create();
			if ($this->StockMovimentItem->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment item has been saved', true));
				$this->redirect(array('controller' => 'stock_moviments', 'action' => 'view', $this->data['StockMovimentItem']['stock_moviment_id']));
			} else {
				$this->Session->setFlash(__('The stock moviment item could not be saved. Please, try again.', true));
			}
		}
		$stockMoviments = $this->StockMovimentItem->StockMoviment->find('list');
		$products = $this->StockMovimentItem->Product->find('list');
		$measureUnits = $this->StockMovimentItem->MeasureUnit->find('list');
		$this->set(compact('stockMovimentId', 'stockMoviments', 'products', 'measureUnits'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stock moviment item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
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
		$stockMoviments = $this->StockMovimentItem->StockMoviment->find('list');
		$products = $this->StockMovimentItem->Product->find('list');
		$measureUnits = $this->StockMovimentItem->MeasureUnit->find('list');
		$this->set(compact('stockMoviments', 'products', 'measureUnits'));
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
}
?>