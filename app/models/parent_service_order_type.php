<?php
class ParentServiceOrderType extends AppModel {
	var $name = 'ParentServiceOrderType';
	var $useDbConfig = 'tuna';
	var $useTable = 'service_order_types';
	var $displayField = 'service_order_type_structure';
	var $order = 'service_order_type_structure';
	
	var $virtualFields = array(
		'service_order_type_structure' => 'fn_service_order_type_structure(ParentServiceOrderType.id)'
		);
}
?>