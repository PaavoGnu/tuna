<?php
class ViewAssetMovimentItem extends AppModel {
	var $name = 'ViewAssetMovimentItem';
	var $useTable = 'v_asset_moviment_items';
	var $useDbConfig = 'tuna';
	var $displayField = 'id';
	
	var $order = 'ViewAssetMovimentItem.asset_moviment_date DESC';
	
	var $virtualFields = array(
		'product_type_structure' => 'fn_product_type_structure(AssetMovimentItem.product_type_id)',
		'product_structure' => 'fn_product_structure(AssetMovimentItem.product_id)',
		'measure_unit_abbreviation' => '(SELECT measure_unit_abbreviation FROM measure_units WHERE id = AssetMovimentItem.measure_unit_id)',
		'user_name' => '(SELECT user_login FROM users WHERE id = AssetMovimentItem.user_id)'
		);
	
	var $belongsTo = array(
		'AssetMoviment' => array(
			'className' => 'AssetMoviment',
			'foreignKey' => 'asset_moviment_id',
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
		'AssetMovimentType' => array(
			'className' => 'AssetMovimentType',
			'foreignKey' => 'asset_moviment_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AssetMovimentItem' => array(
			'className' => 'AssetMovimentItem',
			'foreignKey' => 'asset_moviment_item_id',
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