<?php
class ServiceOrderStep extends AppModel {
	var $name = 'ServiceOrderStep';
	var $useDbConfig = 'tuna';
	var $displayField = 'service_order_step_opening_description';
	var $validate = array(
		'entity_technician_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_order_step_type_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_order_step_opening_date' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_order_step_opening_description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_order_step_opening_user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
			'service_order_step_close_user_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
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
		'ServiceOrder' => array(
			'className' => 'ServiceOrder',
			'foreignKey' => 'service_order_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EntityTechnician' => array(
			'className' => 'EntityTechnician',
			'foreignKey' => 'entity_technician_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderStepType' => array(
			'className' => 'ServiceOrderStepType',
			'foreignKey' => 'service_order_step_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderStepOpeningUser' => array(
			'className' => 'ServiceOrderStepOpeningUser',
			'foreignKey' => 'service_order_step_opening_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderStepCloseUser' => array(
			'className' => 'ServiceOrderStepCloseUser',
			'foreignKey' => 'service_order_step_close_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>