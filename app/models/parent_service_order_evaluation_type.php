<?php
class ParentServiceOrderEvaluationType extends AppModel {
	var $name = 'ParentServiceOrderEvaluationType';
	var $useDbConfig = 'tuna';
	var $useTable = 'service_order_evaluation_types';
	var $displayField = 'service_order_evaluation_type_structure';
	var $order = 'service_order_evaluation_type_structure';
	
	var $virtualFields = array(
		'service_order_evaluation_type_structure' => 'fn_service_order_evaluation_type_structure(ParentServiceOrderEvaluationType.id)'
		);
}
?>