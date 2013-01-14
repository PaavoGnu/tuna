<?php
class EntityType extends AppModel {
	var $name = 'EntityType';
	var $useDbConfig = 'tuna';
	var $displayField = 'entity_type_structure';
	var $order = 'entity_type_structure';
	
	var $virtualFields = array(
		'entity_type_structure' => 'fn_entity_type_structure(EntityType.id)'
		);
		
	var $validate = array(
		'entity_type_name' => array(
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
		'ParentEntityType' => array(
			'className' => 'ParentEntityType',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'Entity' => array(
			'className' => 'Entity',
			'foreignKey' => 'entity_type_id',
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