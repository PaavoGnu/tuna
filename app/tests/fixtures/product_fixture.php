<?php
/* Product Fixture generated on: 2010-11-05 23:11:50 : 1288995950 */
class ProductFixture extends CakeTestFixture {
	var $name = 'Product';

	var $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'primary'),
		'product_type_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'product_brand_id' => array('type' => 'integer', 'null' => false, 'default' => NULL, 'key' => 'index'),
		'product_name' => array('type' => 'string', 'null' => false, 'default' => NULL, 'length' => 50, 'collate' => 'latin1_swedish_ci', 'charset' => 'latin1'),
		'indexes' => array('PRIMARY' => array('column' => 'id', 'unique' => 1), 'fk_products_product_types' => array('column' => 'product_type_id', 'unique' => 0), 'fk_products_product_brands' => array('column' => 'product_brand_id', 'unique' => 0)),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

	var $records = array(
		array(
			'id' => 1,
			'product_type_id' => 1,
			'product_brand_id' => 1,
			'product_name' => 'Lorem ipsum dolor sit amet'
		),
	);
}
?>