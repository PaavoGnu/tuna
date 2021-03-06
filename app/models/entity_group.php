<?php
class EntityGroup extends AppModel {
	var $name = 'EntityGroup';
	var $useDbConfig = 'tuna';
	var $displayField = 'entity_group_structure';
	var $order = 'entity_group_structure';
	
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
		'entity_group_name' => array(
			'fieldLabel' => 'Nome',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
	);
	
	var $virtualFields = array(
		'entity_group_structure' => 'fn_entity_group_structure(EntityGroup.id)'
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
		)
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