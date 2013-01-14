<?php
class StockMovimentOperation extends AppModel {
	var $name = 'StockMovimentOperation';
	var $useDbConfig = 'tuna';
	var $displayField = 'stock_moviment_operation_name';
	var $order = 'stock_moviment_operation_name';
	
	var $validate = array(
		'stock_moviment_operation_name' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $hasMany = array(
		'StockMoviment' => array(
			'className' => 'StockMoviment',
			'foreignKey' => 'stock_moviment_operation_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
?>