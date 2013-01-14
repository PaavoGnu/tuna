<?php
/* ServiceOrdersProducts Test cases generated on: 2010-11-06 05:11:12 : 1289018472*/
App::import('Controller', 'ServiceOrdersProducts');

class TestServiceOrdersProductsController extends ServiceOrdersProductsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ServiceOrdersProductsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.service_orders_product', 'app.service_order', 'app.enterprise', 'app.entity', 'app.entity_type', 'app.entity_technician', 'app.service_order_step', 'app.service_order_step_type', 'app.user', 'app.stock_moviment', 'app.stock', 'app.enterprises_stock', 'app.stock_moviment_type', 'app.stock_moviment_operation', 'app.stock_moviment_item', 'app.product', 'app.product_type', 'app.product_brand', 'app.entities_product', 'app.measure_unit', 'app.service_orders_stock_moviment', 'app.entity_group', 'app.entities_entity_group', 'app.system_version_definition', 'app.system_version', 'app.system', 'app.system_versions_enterprise', 'app.service_order_type');

	function startTest() {
		$this->ServiceOrdersProducts =& new TestServiceOrdersProductsController();
		$this->ServiceOrdersProducts->constructClasses();
	}

	function endTest() {
		unset($this->ServiceOrdersProducts);
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