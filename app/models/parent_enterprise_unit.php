<?php
class ParentEnterpriseUnit extends AppModel {
	var $name = 'ParentEnterpriseUnit';
	var $useDbConfig = 'tuna';
	var $useTable = 'enterprise_units';
	var $displayField = 'enterprise_unit_structure';
	var $order = 'enterprise_unit_structure';
	
	var $virtualFields = array(
		'enterprise_unit_structure' => 'fn_enterprise_unit_structure(ParentEnterpriseUnit.id)'
		);
}
?>