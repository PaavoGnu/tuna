<?php
class ViewStockMovimentItem extends AppModel {
	var $name = 'ViewStockMovimentItem';
	var $useTable = 'v_stock_moviment_items';
	var $useDbConfig = 'tuna';
	var $displayField = 'id';
	
	var $order = 'ViewStockMovimentItem.stock_moviment_date DESC';
	
	var $virtualFields = array(
		'product_type_structure' => 'fn_product_type_structure(StockMovimentItem.product_type_id)',
		'product_structure' => 'fn_product_structure(StockMovimentItem.product_id)',
		'measure_unit_abbreviation' => '(SELECT measure_unit_abbreviation FROM measure_units WHERE id = StockMovimentItem.measure_unit_id)',
		'user_name' => '(SELECT user_login FROM users WHERE id = StockMovimentItem.user_id)'
		);
	
	var $belongsTo = array(
		'StockMoviment' => array(
			'className' => 'StockMoviment',
			'foreignKey' => 'stock_moviment_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Enterprise' => array(
			'className' => 'Enterprise',
			'foreignKey' => 'enterprise_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EnterpriseUnit' => array(
			'className' => 'EnterpriseUnit',
			'foreignKey' => 'enterprise_unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Stock' => array(
			'className' => 'Stock',
			'foreignKey' => 'stock_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StockMovimentType' => array(
			'className' => 'StockMovimentType',
			'foreignKey' => 'stock_moviment_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StockMovimentItem' => array(
			'className' => 'StockMovimentItem',
			'foreignKey' => 'stock_moviment_item_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProductType' => array(
			'className' => 'ProductType',
			'foreignKey' => 'product_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MeasureUnit' => array(
			'className' => 'MeasureUnit',
			'foreignKey' => 'measure_unit_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

}
?>