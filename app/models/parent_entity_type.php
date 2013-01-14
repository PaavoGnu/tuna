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
}
?>