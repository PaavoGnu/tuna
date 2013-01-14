<?php
class ServiceOrderEvaluationType extends AppModel {
	var $name = 'ServiceOrderEvaluationType';
	var $useDbConfig = 'tuna';
	var $displayField = 'service_order_evaluation_type_structure';
	var $order = 'service_order_evaluation_type_structure';
	
	var $virtualFields = array(
		'service_order_evaluation_type_structure' => 'fn_service_order_evaluation_type_structure(ServiceOrderEvaluationType.id)'
		);
	
	var $validate = array(
		'service_order_evaluation_type_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'ServiceOrder' => array(
			'className' => 'ServiceOrder',
			'foreignKey' => 'service_order_evaluation_type_id',
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

	var $belongsTo = array(
		'ParentServiceOrderEvaluationType' => array(
			'className' => 'ParentServiceOrderEvaluationType',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>