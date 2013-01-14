<?php
class ViewAssetMovimentItemsController extends AppController {

	var $name = 'ViewAssetMovimentItems';

	function index() {
		$this->ViewAssetMovimentItem->recursive = 0;
		$this->set('viewAssetMovimentItems', $this->paginate());
	}
}
?>