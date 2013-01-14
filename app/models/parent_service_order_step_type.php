<?php
class ParentServiceOrderStepType extends AppModel {
	var $name = 'ParentServiceOrderStepType';
	var $useDbConfig = 'tuna';
	var $useTable = 'service_order_step_types';
	var $displayField = 'service_order_step_type_structure';
	var $order = 'service_order_step_type_structure';
	
	var $virtualFields = array(
		'service_order_step_type_structure' => 'fn_service_order_step_type_structure(ParentServiceOrderStepType.id)'
		);
}
?>