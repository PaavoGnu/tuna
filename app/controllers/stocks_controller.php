<?php
class StocksController extends AppController {

	var $name = 'Stocks';

	function index() {
		parent::index();
	
		$this->Stock->recursive = 0;
		$this->set('stocks', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid stock', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('stock', $this->Stock->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->Stock->create();
			if ($this->Stock->save($this->data)) {
				$this->Session->setFlash(__('The stock has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid stock', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->Stock->save($this->data)) {
				$this->Session->setFlash(__('The stock has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The stock could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->Stock->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for stock', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->Stock->delete($id)) {
			$this->Session->setFlash(__('Stock deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Stock was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>