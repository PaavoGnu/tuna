<?php
class ParentEnterprise extends AppModel {
	var $name = 'ParentEnterprise';
	var $useDbConfig = 'tuna';
	var $useTable = 'enterprises';
	var $displayField = 'enterprise_structure';
	var $order = 'enterprise_structure';
	
	var $virtualFields = array(
		'enterprise_structure' => 'fn_enterprise_structure(ParentEnterprise.id)'
		);
}
?>