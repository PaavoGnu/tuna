<?php
class StockMovimentOperationsController extends AppController {

	var $name = 'StockMovimentOperations';

	function index() {
		parent::index();
	
		$this->StockMovimentOperation->recursive = 0;
		$this->set('stockMovimentOperations', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stock moviment operation ', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stockMovimentOperation', $this->StockMovimentOperation->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->StockMovimentOperation->create();
			if ($this->StockMovimentOperation->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment operation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviment operation could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stock moviment operation ', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->StockMovimentOperation->save($this->data)) {
				$this->Session->setFlash(__('The stock moviment operation has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock moviment operation could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->StockMovimentOperation->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stock moviment operation ', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->StockMovimentOperation->delete($id)) {
			$this->Session->setFlash(__('Stock moviment operation deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Stock moviment operation was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>