<?php
class EntityContact extends AppModel {
	var $name = 'EntityContact';
	var $useDbConfig = 'tuna';
	var $useTable = 'entities';
	var $displayField = 'entity_contact_name';
	var $order = 'entity_contact_name';
	
	var $virtualFields = array(
		'entity_contact_name' => '(SELECT entity_name FROM entities WHERE id = EntityContact.id)'
		);
}
?>