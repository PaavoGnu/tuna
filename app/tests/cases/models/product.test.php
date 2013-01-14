<?php
/* Product Test cases generated on: 2010-11-05 23:11:53 : 1288995953*/
App::import('Model', 'Product');

class ProductTestCase extends CakeTestCase {
	var $fixtures = array('app.product', 'app.product_type', 'app.product_brand', 'app.stock_moviment_item', 'app.stock_moviment', 'app.enterprise', 'app.entity', 'app.entity_type', 'app.entity_technician', 'app.service_order_step', 'app.service_order', 'app.service_order_type', 'app.user', 'app.service_orders_product', 'app.service_orders_stock_moviment', 'app.service_order_step_type', 'app.entity_group', 'app.entities_entity_group', 'app.entities_product', 'app.system_version_definition', 'app.system_version', 'app.system', 'app.system_versions_enterprise', 'app.stock', 'app.enterprises_stock', 'app.stock_moviment_type', 'app.stock_moviment_operation', 'app.measure_unit');

	function startTest() {
		$this->Product =& ClassRegistry::init('Product');
	}

	function endTest() {
		unset($this->Product);
		ClassRegistry::flush();
	}

}
?>