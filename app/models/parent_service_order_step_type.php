<?php
class ParentServiceOrderStepType extends AppModel {
	var $name = 'ParentServiceOrderStepType';
	var $useDbConfig = 'tuna';
	var $useTable = 'service_order_step_types';
	var $displayField = 'service_order_step_type_structure';
	
	var $virtualFields = array(
		'service_order_step_type_structure' => 'fn_service_order_step_type_structure(ParentServiceOrderStepType.id)'
		);

	var $hasMany = array(
		'ServiceOrderStepType' => array(
			'className' => 'ServiceOrderStepType',
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
		'ServiceOrderStep' => array(
			'className' => 'ServiceOrderStep',
			'foreignKey' => 'service_order_step_type_id',
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