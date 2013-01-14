<?php
/* StockMovimentItem Fixture generated on: 2010-11-05 23:11:52 : 1288995652 */
class StockMovimentItemFixture extends CakeTestFixture {
	var $name = 'StockMovimentItem';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'parent_id' => array('type' => 'integer', 'null' => true, 'default' => NULL, 'key' => 'index'),
		'stock_moviment_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'product_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'measure_unit_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'stock_moviment_item_amount' => array('type' => 'float', 'null' => false, 'default' => NULL, 'length' => '10,8'),
		'stock_moviment_item_serial_number' => array('type' => 'string', 'null' => true, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_stock_moviment_items_measure_units' => array('column' => 'measure_unit_id', 'unique' => 0), 'fk_stock_moviment_items_products' => array('column' => 'product_id', 'unique' => 0), 'fk_stock_moviment_items_stock_items' => array('column' => 'parent_id', 'unique' => 0), 'fk_stock_moviment_items_stock_moviments' => array('column' => 'stock_moviment_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'parent_id' => 1,
			'stock_moviment_id' => 1,
			'product_id' => 1,
			'measure_unit_id' => 1,
			'stock_moviment_item_amount' => 1,
			'stock_moviment_item_serial_number' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>