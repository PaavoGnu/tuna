<?php
class ServiceOrderStepType extends AppModel {
	var $name = 'ServiceOrderStepType';
	var $useDbConfig = 'tuna';
	var $displayField = 'service_order_step_type_structure';
	var $order = 'service_order_step_type_structure';
	
	var $swModelFields = array(
		'id' => array(
			'fieldLabel' => 'ID',
			'fieldType' => 'text',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'parent_id' =>  array(
			'fieldLabel' => 'Grupo',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_step_type_name' => array(
			'fieldLabel' => 'Nome',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_step_type_description' => array(
			'fieldLabel' => 'Descrição',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
	);
	
	var $virtualFields = array(
		'service_order_step_type_structure' => 'fn_service_order_step_type_structure(ServiceOrderStepType.id)'
		);
	
	var $validate = array(
		'service_order_step_type_name' => array(
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

	var $belongsTo = array(
		'ParentServiceOrderStepType' => array(
			'className' => 'ParentServiceOrderStepType',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
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