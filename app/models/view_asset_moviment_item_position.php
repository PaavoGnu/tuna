<?php
class ViewAssetMovimentItemPosition extends AppModel {
	var $name = 'ViewAssetMovimentItemPosition';
	var $useTable = 'v_asset_moviment_item_positions';
	var $useDbConfig = 'tuna';
	var $displayField = 'id';
	
	var $order = '
		ViewAssetMovimentItemPosition.enterprise_id,
		ViewAssetMovimentItemPosition.enterprise_unit_id,
		ViewAssetMovimentItemPosition.product_type_structure,
		ViewAssetMovimentItemPosition.product_structure,
		ViewAssetMovimentItemPosition.measure_unit_abbreviation';
	
	var $swModelFields = array(
		'enterprise_id' =>  array(
			'fieldLabel' => 'Empresa',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'enterprise_unit_id' =>  array(
			'fieldLabel' => 'Unidade de Empresa',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'product_type_id' =>  array(
			'fieldLabel' => 'Tipo de Produto',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'product_id' =>  array(
			'fieldLabel' => 'Produto',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'measure_unit_id' =>  array(
			'fieldLabel' => 'Unidade de Medida',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'asset_moviment_item_position' =>  array(
			'fieldLabel' => 'Quantidade',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),		
	);
	
	var $virtualFields = array(
		'product_type_structure' => 'fn_product_type_structure(ViewAssetMovimentItemPosition.product_type_id)',
		'product_structure' => 'fn_product_structure(ViewAssetMovimentItemPosition.product_id)',
		'measure_unit_abbreviation' => '(SELECT measure_unit_abbreviation FROM measure_units WHERE id = ViewAssetMovimentItemPosition.measure_unit_id)'
		);
	
	var $belongsTo = array(
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