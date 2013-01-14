<?php
class ViewAssetMovimentItemPositionsController extends AppController {

	var $name = 'ViewAssetMovimentItemPositions';

	function index() {
		$this->ViewAssetMovimentItemPosition->recursive = 0;
		$this->set('viewAssetMovimentItemPositions', $this->paginate());
	}
}
?>