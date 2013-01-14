<?php
/* ServiceOrderProduct Fixture generated on: 2010-11-06 13:11:39 : 1289048079 */
class ServiceOrderProductFixture extends CakeTestFixture {
	var $name = 'ServiceOrderProduct';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'service_order_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'measure_unit_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'service_order_product_amount' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '10,8'),
		'service_order_product_serial_number' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'service_order_product_description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_service_order_products_products' => array('column' => 'product_id', 'unique' => 0), 'fk_service_order_products_measure_units' => array('column' => 'measure_unit_id', 'unique' => 0), 'fk_service_order_products_service_orders' => array('column' => 'service_order_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'service_order_id' => 1,
			'product_id' => 1,
			'measure_unit_id' => 1,
			'service_order_product_amount' => 1,
			'service_order_product_serial_number' => 'Lorem ipsum dolor sit amet',
			'service_order_product_description' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>