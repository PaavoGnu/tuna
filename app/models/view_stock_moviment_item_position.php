<?php
class ViewStockMovimentItemPosition extends AppModel {
	var $name = 'ViewStockMovimentItemPosition';
	var $useTable = 'v_stock_moviment_item_positions';
	var $useDbConfig = 'tuna';
	var $displayField = 'id';
	
	var $order = '
		ViewStockMovimentItemPosition.enterprise_id,
		ViewStockMovimentItemPosition.enterprise_unit_id,
		ViewStockMovimentItemPosition.stock_id,
		ViewStockMovimentItemPosition.product_type_structure,
		ViewStockMovimentItemPosition.product_structure,
		ViewStockMovimentItemPosition.measure_unit_abbreviation';
	
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
		'stock_id' =>  array(
			'fieldLabel' => 'Estoque',
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
		'stock_moviment_item_position' =>  array(
			'fieldLabel' => 'Quantidade',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),		
	);
	
	var $virtualFields = array(
		'product_type_structure' => 'fn_product_type_structure(ViewStockMovimentItemPosition.product_type_id)',
		'product_structure' => 'fn_product_structure(ViewStockMovimentItemPosition.product_id)',
		'measure_unit_abbreviation' => '(SELECT measure_unit_abbreviation FROM measure_units WHERE id = ViewStockMovimentItemPosition.measure_unit_id)'
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
		'Stock' => array(
			'className' => 'Stock',
			'foreignKey' => 'stock_id',
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