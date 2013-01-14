<?php
class ViewStockMovimentItemPositionsController extends AppController {

	var $name = 'ViewStockMovimentItemPositions';

	function index() {
		$this->ViewStockMovimentItemPosition->recursive = 0;
		$this->set('viewStockMovimentItemPositions', $this->paginate());
	}
}
?>