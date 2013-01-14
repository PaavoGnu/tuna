<?php
/* ServiceOrder Fixture generated on: 2010-11-05 23:11:53 : 1288995473 */
class ServiceOrderFixture extends CakeTestFixture {
	var $name = 'ServiceOrder';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'enterprise_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'entity_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'service_order_type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'service_order_opening_date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'service_order_opening_description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'service_order_opening_user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'entity_technician_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'service_order_routing_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'service_order_routing_user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'service_order_cancellation_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'service_order_cancellation_description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'service_order_cancellation_user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'service_order_close_date' => array('type' => 'datetime', 'null' => true, 'default' => NULL),
		'service_order_close_description' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 500, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'service_order_close_user_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_service_orders_entity_technicians' => array('column' => 'entity_technician_id', 'unique' => 0), 'fk_service_orders_service_order_types' => array('column' => 'service_order_type_id', 'unique' => 0), 'fk_service_orders_enterprises' => array('column' => 'enterprise_id', 'unique' => 0), 'fk_service_orders_users_opening' => array('column' => 'service_order_opening_user_id', 'unique' => 0), 'fk_service_orders_users_routing' => array('column' => 'service_order_routing_user_id', 'unique' => 0), 'fk_service_orders_users_cancellation' => array('column' => 'service_order_cancellation_user_id', 'unique' => 0), 'fk_service_orders_users_close' => array('column' => 'service_order_close_user_id', 'unique' => 0), 'fk_service_orders_entities' => array('column' => 'entity_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'enterprise_id' => 1,
			'entity_id' => 1,
			'service_order_type_id' => 1,
			'service_order_opening_date' => '2010-11-05 23:17:53',
			'service_order_opening_description' => 'Lorem ipsum dolor sit amet',
			'service_order_opening_user_id' => 1,
			'entity_technician_id' => 1,
			'service_order_routing_date' => '2010-11-05 23:17:53',
			'service_order_routing_user_id' => 1,
			'service_order_cancellation_date' => '2010-11-05 23:17:53',
			'service_order_cancellation_description' => 'Lorem ipsum dolor sit amet',
			'service_order_cancellation_user_id' => 1,
			'service_order_close_date' => '2010-11-05 23:17:53',
			'service_order_close_description' => 'Lorem ipsum dolor sit amet',
			'service_order_close_user_id' => 1
		),
	);
}
?>