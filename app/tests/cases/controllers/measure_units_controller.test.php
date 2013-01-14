<?php
/* MeasureUnits Test cases generated on: 2010-11-06 13:11:23 : 1289048183*/
App::import('Controller', 'MeasureUnits');

class TestMeasureUnitsController extends MeasureUnitsController {
	var $autoRender = false;

	function redirect($url, $status = null, $exit = true) {
		$this->redirectUrl = $url;
	}
}

class MeasureUnitsControllerTestCase extends CakeTestCase {
	var $fixtures = array('app.measure_unit', 'app.entity_product', 'app.entity', 'app.entity_type', 'app.enterprise', 'app.service_order', 'app.service_order_type', 'app.user', 'app.service_order_step', 'app.entity_technician', 'app.service_order_step_type', 'app.stock_moviment', 'app.stock', 'app.enterprises_stock', 'app.stock_moviment_type', 'app.stock_moviment_operation', 'app.stock_moviment_item', 'app.product', 'app.product_type', 'app.product_brand', 'app.service_order_product', 'app.service_orders_stock_moviment', 'app.system_version_definition', 'app.system_version', 'app.system', 'app.system_versions_enterprise', 'app.entity_group', 'app.entities_entity_group');

	function startTest() {
		$this->MeasureUnits =& new TestMeasureUnitsController();
		$this->MeasureUnits->constructClasses();
	}

	function endTest() {
		unset($this->MeasureUnits);
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