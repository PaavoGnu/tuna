<?php
class ParentEntityType extends AppModel {
	var $name = 'ParentEntityType';
	var $useDbConfig = 'tuna';
	var $useTable = 'entity_types';
	var $displayField = 'entity_type_structure';
	var $order = 'entity_type_structure';
	
	var $virtualFields = array(
		'entity_type_structure' => 'fn_entity_type_structure(ParentEntityType.id)'
		);
		
	var $hasMany = array(
		'EntityType' => array(
			'className' => 'EntityType',
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