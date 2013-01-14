<?php
class ParentServiceOrderPriorityType extends AppModel {
	var $name = 'ParentServiceOrderPriorityType';
	var $useDbConfig = 'tuna';
	var $useTable = 'service_order_priority_types';
	var $displayField = 'service_order_priority_type_structure';
	var $order = 'service_order_priority_type_structure';
	
	var $virtualFields = array(
		'service_order_priority_type_structure' => 'fn_service_order_priority_type_structure(ParentServiceOrderPriorityType.id)'
		);
}
?>