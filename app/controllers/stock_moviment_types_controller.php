<?php
class StockMovimentTypesController extends AppController {

	var $name = 'StockMovimentTypes';

	function index() {
		parent::index();
	
		$this->StockMovimentType->recursive = 0;
		$this->set('stockMovimentTypes', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
		
		$parents = $this->StockMovimentType->ParentStockMovimentType->find('list');
		$stockMovimentOperations = $this->StockMovimentType->StockMovimentOperation->find('list');
		$this->set(compact('parents', 'stockMovimentOperations'));
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stock moviment type', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stockMovimentType', $this->StockMovimentType->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->StockMovimentType->create();
			if ($this->StockMovimentType->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviment type could not be saved. Please, try again.', true));
			}
		}
		$parents = $this->StockMovimentType->ParentStockMovimentType->find('list');
		$stockMovimentOperations = $this->StockMovimentType->StockMovimentOperation->find('list');
		$this->set(compact('parents', 'stockMovimentOperations'));
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stock moviment type', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StockMovimentType->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment type has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviment type could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StockMovimentType->read(null, $id);
		}
		$parents = $this->StockMovimentType->ParentStockMovimentType->find('list');
		$stockMovimentOperations = $this->StockMovimentType->StockMovimentOperation->find('list');
		$this->set(compact('parents', 'stockMovimentOperations'));
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stock moviment type', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StockMovimentType->delete($id)) {
			$this->Session->setFlash(__('Stock moviment type deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Stock moviment type was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>