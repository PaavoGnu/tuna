<?php
/* ServiceOrderProduct Test cases generated on: 2010-11-06 13:11:39 : 1289048079*/
App::import('Model', 'ServiceOrderProduct');

class ServiceOrderProductTestCase extends CakeTestCase {
	var $fixtures = array('app.service_order_product', 'app.service_order', 'app.enterprise', 'app.entity', 'app.entity_type', 'app.entity_technician', 'app.service_order_step', 'app.service_order_step_type', 'app.user', 'app.stock_moviment', 'app.stock', 'app.enterprises_stock', 'app.stock_moviment_type', 'app.stock_moviment_operation', 'app.stock_moviment_item', 'app.product', 'app.product_type', 'app.product_brand', 'app.entity_product', 'app.measure_unit', 'app.service_orders_stock_moviment', 'app.entity_group', 'app.entities_entity_group', 'app.system_version_definition', 'app.system_version', 'app.system', 'app.system_versions_enterprise', 'app.service_order_type');

	function startTest() {
		$this->ServiceOrderProduct =& ClassRegistry::init('ServiceOrderProduct');
	}

	function endTest() {
		unset($this->ServiceOrderProduct);
		ClassRegistry::flush();
	}

}
?>