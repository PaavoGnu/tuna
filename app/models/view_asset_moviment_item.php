<?php
class ViewAssetMovimentItem extends AppModel {
	var $name = 'ViewAssetMovimentItem';
	var $useTable = 'v_asset_moviment_items';
	var $useDbConfig = 'tuna';
	var $displayField = 'id';
	var $order = 'ViewAssetMovimentItem.asset_moviment_date DESC';
	
	var $swModelFields = array(
		'asset_moviment_id' => array(
			'fieldLabel' => 'Movimento',
			'fieldType' => 'text',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'asset_moviment_item_id' => array(
			'fieldLabel' => 'Item',
			'fieldType' => 'text',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'asset_moviment_date' =>  array(
			'fieldLabel' => 'Data',
			'fieldType' => 'datetime',
			'fieldDateFormat' => 'DMY', 
			'fieldTimeFormat' => '24',
			'fieldMinYear' => '2000',
			
			'filter' => true,
			'filterType' => 'between',
			'filterData' => null,
			'filterCondition' => null,
		),
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
		'asset_moviment_type_id' =>  array(
			'fieldLabel' => 'Tipo',
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
		'asset_moviment_item_amount' =>  array(
			'fieldLabel' => 'Quantidade',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'asset_moviment_item_serial_number' =>  array(
			'fieldLabel' => 'Número de Série',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
		'asset_moviment_item_service_number' =>  array(
			'fieldLabel' => 'Etiqueta de Serviço',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
	);
	
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