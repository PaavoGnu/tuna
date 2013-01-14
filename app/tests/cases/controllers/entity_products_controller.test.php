<?php
/* EntityProducts Test cases generated on: 2010-11-06 14:11:02 : 1289049902*/
App::import('Controller', 'EntityProducts');

class TestEntityProductsController extends EntityProductsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class EntityProductsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.entity_product', 'app.entity', 'app.entity_type', 'app.enterprise', 'app.service_order', 'app.service_order_type', 'app.user', 'app.service_order_step', 'app.entity_technician', 'app.service_order_step_type', 'app.stock_moviment', 'app.stock', 'app.enterprises_stock', 'app.stock_moviment_type', 'app.stock_moviment_operation', 'app.stock_moviment_item', 'app.product', 'app.product_type', 'app.product_brand', 'app.service_order_product', 'app.measure_unit', 'app.service_orders_stock_moviment', 'app.system_version_definition', 'app.system_version', 'app.system', 'app.system_versions_enterprise', 'app.entity_group', 'app.entities_entity_group');

	function startTest() {
		$this->EntityProducts =& new TestEntityProductsController();
		$this->EntityProducts->constructClasses();
	}

	function endTest() {
		unset($this->EntityProducts);
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