<?php
/* StockMoviments Test cases generated on: 2010-11-06 14:11:37 : 1289050537*/
App::import('Controller', 'StockMoviments');

class TestStockMovimentsController extends StockMovimentsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class StockMovimentsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.stock_moviment', 'app.enterprise', 'app.entity', 'app.entity_type', 'app.entity_technician', 'app.service_order_step', 'app.service_order', 'app.service_order_type', 'app.user', 'app.service_order_product', 'app.product', 'app.product_type', 'app.product_brand', 'app.stock_moviment_item', 'app.measure_unit', 'app.entity_product', 'app.service_orders_stock_moviment', 'app.service_order_step_type', 'app.entity_group', 'app.entities_entity_group', 'app.system_version_definition', 'app.system_version', 'app.system', 'app.system_versions_enterprise', 'app.stock', 'app.enterprises_stock', 'app.stock_moviment_type', 'app.stock_moviment_operation');

	function startTest() {
		$this->StockMoviments =& new TestStockMovimentsController();
		$this->StockMoviments->constructClasses();
	}

	function endTest() {
		unset($this->StockMoviments);
		ClassRegistry::flush();
	}

	function testIndex() {

	}

	function testView() {

	}

	function testAdd() {

	}

	function testEdit() {

	}

	function testDelete() {

	}

}
?>