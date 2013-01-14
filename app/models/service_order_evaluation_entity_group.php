<?php
class ServiceOrderEvaluationEntityGroup extends AppModel {
	var $name = 'EntityGroup';
	var $useDbConfig = 'tuna';
	var $displayField = 'entity_group_structure';
	var $order = 'entity_group_structure';
	
	var $virtualFields = array(
		'entity_group_structure' => 'fn_entity_group_structure(ServiceOrderEvaluationEntityGroup.id)'
		);
		
	var $validate = array(
		'entity_group_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'entity_group_description' => array(
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
		'ParentEntityGroup' => array(
			'className' => 'ParentEntityGroup',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
	
	var $hasMany = array(
		'ServiceOrder' => array(
			'className' => 'ServiceOrder',
			'foreignKey' => 'service_order_evaluation_entity_group_id',
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

	var $hasAndBelongsToMany = array(
		'Entity' => array(
			'className' => 'Entity',
			'joinTable' => 'entities_entity_groups',
			'foreignKey' => 'entity_group_id',
			'associationForeignKey' => 'entity_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);
}
?>