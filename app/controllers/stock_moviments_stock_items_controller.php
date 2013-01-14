<?php
class StockMovimentsStockItemsController extends AppController {

	var $name = 'StockMovimentsStockItems';

	function index() {
		$this->StockMovimentsStockItem->recursive = 0;
		$this->set('stockMovimentsStockItems', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stock moviments stock item', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stockMovimentsStockItem', $this->StockMovimentsStockItem->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->StockMovimentsStockItem->create();
			if ($this->StockMovimentsStockItem->save($this->data)) {
				$this->Session->setFlash(__('The stock moviments stock item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviments stock item could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stock moviments stock item', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StockMovimentsStockItem->save($this->data)) {
				$this->Session->setFlash(__('The stock moviments stock item has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviments stock item could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StockMovimentsStockItem->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stock moviments stock item', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StockMovimentsStockItem->delete($id)) {
			$this->Session->setFlash(__('Stock moviments stock item deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Stock moviments stock item was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>