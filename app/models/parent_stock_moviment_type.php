<?php
class ParentStockMovimentType extends AppModel {
	var $name = 'StockMovimentType';
	var $useDbConfig = 'tuna';
	var $useDbTable = 'stock_moviment_types';
	var $displayField = 'stock_moviment_type_structure';
	var $order = 'stock_moviment_type_structure';
	
	var $virtualFields = array(
		'stock_moviment_type_structure' => 'fn_stock_moviment_type_structure(ParentStockMovimentType.id)'
		);
}
?>