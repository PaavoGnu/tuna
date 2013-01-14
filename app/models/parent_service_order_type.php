<?php
class ParentServiceOrderType extends AppModel {
	var $name = 'ParentServiceOrderType';
	var $useDbConfig = 'tuna';
	var $useTable = 'service_order_types';
	var $displayField = 'service_order_type_structure';
	
	var $virtualFields = array(
		'service_order_type_structure' => 'fn_service_order_type_structure(ParentServiceOrderType.id)'
		);

	var $hasMany = array(
		'ServiceOrderType' => array(
			'className' => 'ServiceOrderType',
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
		'ServiceOrder' => array(
			'className' => 'ServiceOrder',
			'foreignKey' => 'service_order_type_id',
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