<?php
/* StockMoviment Fixture generated on: 2010-11-05 23:11:27 : 1288994967 */
class StockMovimentFixture extends CakeTestFixture {
	var $name = 'StockMoviment';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'enterprise_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'stock_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'stock_moviment_type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'user_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'stock_moviment_date' => array('type' => 'datetime', 'null' => false, 'default' => NULL),
		'stock_moviment_description' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 100, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_stock_moviments_stocks' => array('column' => 'stock_id', 'unique' => 0), 'fk_stock_moviments_stock_moviment_types' => array('column' => 'stock_moviment_type_id', 'unique' => 0), 'fk_stock_moviments_users' => array('column' => 'user_id', 'unique' => 0), 'fk_stock_moviments_enterprises' => array('column' => 'enterprise_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'enterprise_id' => 1,
			'stock_id' => 1,
			'stock_moviment_type_id' => 1,
			'user_id' => 1,
			'stock_moviment_date' => '2010-11-05 23:09:27',
			'stock_moviment_description' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>