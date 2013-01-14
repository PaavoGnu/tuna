<?php
class StockMovimentsController extends AppController {

	var $name = 'StockMoviments';

	function index() {
		$this->StockMoviment->recursive = 0;
		$this->set('stockMoviments', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stock moviment', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stockMoviment', $this->StockMoviment->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->StockMoviment->create();
			if ($this->StockMoviment->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviment could not be saved. Please, try again.', true));
			}
		}
		$enterprises = $this->StockMoviment->Enterprise->find('list');
		$stocks = $this->StockMoviment->Stock->find('list');
		$stockMovimentTypes = $this->StockMoviment->StockMovimentType->find('list');
		$users = $this->StockMoviment->User->find('list');
		$serviceOrders = $this->StockMoviment->ServiceOrder->find('list');
		$this->set(compact('enterprises', 'stocks', 'stockMovimentTypes', 'users', 'serviceOrders'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stock moviment', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StockMoviment->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviment could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StockMoviment->read(null, $id);
		}
		$enterprises = $this->StockMoviment->Enterprise->find('list');
		$stocks = $this->StockMoviment->Stock->find('list');
		$stockMovimentTypes = $this->StockMoviment->StockMovimentType->find('list');
		$users = $this->StockMoviment->User->find('list');
		$serviceOrders = $this->StockMoviment->ServiceOrder->find('list');
		$this->set(compact('enterprises', 'stocks', 'stockMovimentTypes', 'users', 'serviceOrders'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stock moviment', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StockMoviment->delete($id)) {
			$this->Session->setFlash(__('Stock moviment deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Stock moviment was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>