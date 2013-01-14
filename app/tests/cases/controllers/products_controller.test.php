<?php
/* Products Test cases generated on: 2010-11-06 13:11:09 : 1289048169*/
App::import('Controller', 'Products');

class TestProductsController extends ProductsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class ProductsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.product', 'app.product_type', 'app.product_brand', 'app.stock_moviment_item', 'app.stock_moviment', 'app.enterprise', 'app.entity', 'app.entity_type', 'app.entity_technician', 'app.service_order_step', 'app.service_order', 'app.service_order_type', 'app.user', 'app.service_order_product', 'app.measure_unit', 'app.entity_product', 'app.service_orders_stock_moviment', 'app.service_order_step_type', 'app.entity_group', 'app.entities_entity_group', 'app.system_version_definition', 'app.system_version', 'app.system', 'app.system_versions_enterprise', 'app.stock', 'app.enterprises_stock', 'app.stock_moviment_type', 'app.stock_moviment_operation');

	function startTest() {
		$this->Products =& new TestProductsController();
		$this->Products->constructClasses();
	}

	function endTest() {
		unset($this->Products);
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