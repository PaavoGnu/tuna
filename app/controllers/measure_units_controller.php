<?php
class MeasureUnitsController extends AppController {

	var $name = 'MeasureUnits';

	function index() {
		$this->MeasureUnit->recursive = 0;
		$this->set('measureUnits', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid measure unit', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('measureUnit', $this->MeasureUnit->read(null, $id));
	}

	function add() {
		if (!empty($this->data)) {
			$this->MeasureUnit->create();
			if ($this->MeasureUnit->save($this->data)) {
				$this->Session->setFlash(__('The measure unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measure unit could not be saved. Please, try again.', true));
			}
		}
	}

	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Invalid measure unit', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->MeasureUnit->save($this->data)) {
				$this->Session->setFlash(__('The measure unit has been saved', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The measure unit could not be saved. Please, try again.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->MeasureUnit->read(null, $id);
		}
	}

	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Invalid id for measure unit', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($this->MeasureUnit->delete($id)) {
			$this->Session->setFlash(__('Measure unit deleted', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Measure unit was not deleted', true));
		$this->redirect(array('action' => 'index'));
	}
}
?>