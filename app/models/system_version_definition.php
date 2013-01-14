<?php
class SystemVersionDefinition extends AppModel {
	var $name = 'SystemVersionDefinition';
	var $useDbConfig = 'tuna';
	var $displayField = 'system_version_id';
	var $validate = array(
		'system_version_id' => array(
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
		'enterprise_id' => array(
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
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'SystemVersion' => array(
			'className' => 'SystemVersion',
			'foreignKey' => 'system_version_id',
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
		'SystemVersionDefinition' => array(
			'className' => 'SystemVersionDefinition',
			'foreignKey' => 'system_definition_input_stock_moviment_operation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'SystemVersionDefinition' => array(
			'className' => 'SystemVersionDefinition',
			'foreignKey' => 'system_definition_output_stock_moviment_operation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
?>