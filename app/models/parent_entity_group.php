<?php
class ParentEntityGroup extends AppModel {
	var $name = 'ParentEntityGroup';
	var $useDbConfig = 'tuna';
	var $useTable = 'entity_groups';
	var $displayField = 'entity_group_structure';
	
	var $virtualFields = array(
		'entity_group_structure' => 'fn_entity_group_structure(ParentEntityGroup.id)'
		);
		
	var $hasMany = array(
		'EntityGroup' => array(
			'className' => 'EntityGroup',
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