<?php
class ParentProductType extends AppModel {
	var $name = 'ParentProductType';
	var $useDbConfig = 'tuna';
	var $useTable = 'product_types';
	var $displayField = 'product_type_structure';
	var $order = 'product_type_structure';
	
	var $virtualFields = array(
		'product_type_structure' => 'fn_product_type_structure(ParentProductType.id)'
		);
}
?>