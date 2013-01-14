<?php
class ParentProductType extends AppModel {
	var $name = 'ParentProductType';
	var $useDbConfig = 'tuna';
	var $useTable = 'product_types';
	var $displayField = 'product_type_structure';
	
	var $virtualFields = array(
		'product_type_structure' => 'fn_product_type_structure(ParentProductType.id)'
		);

	var $hasMany = array(
		'ProductType' => array(
			'className' => 'ProductType',
			'foreignKey' => 'parent_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'Product' => array(
			'className' => 'Product',
			'foreignKey' => 'product_type_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>