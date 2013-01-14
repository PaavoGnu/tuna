<?php
class ParentEntityGroup extends AppModel {
	var $name = 'ParentEntityGroup';
	var $useDbConfig = 'tuna';
	var $useTable = 'entity_groups';
	var $displayField = 'entity_group_structure';
	var $order = 'entity_group_structure';
	
	var $virtualFields = array(
		'entity_group_structure' => 'fn_entity_group_structure(ParentEntityGroup.id)'
		);
}
?>