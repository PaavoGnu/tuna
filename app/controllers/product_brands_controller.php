<?php
class ProductBrandsController extends AppController {

	var $name = 'ProductBrands';

	function index() {
		parent::index();
	
		$this->ProductBrand->recursive = 0;
		$this->set('productBrands', $this->paginate());
	}
	
	function indexFilter() {
		parent::indexFilter();
	}
	
	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid product brand', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('productBrand', $this->ProductBrand->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->ProductBrand->create();
			if ($this->ProductBrand->save($this->data)) {
				$this->Session->setFlash(__('The product brand has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product brand could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid product brand', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->ProductBrand->save($this->data)) {
				$this->Session->setFlash(__('The product brand has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The product brand could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->ProductBrand->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for product brand', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->ProductBrand->delete($id)) {
			$this->Session->setFlash(__('Product brand deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Product brand was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>
