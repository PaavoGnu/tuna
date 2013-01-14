<?php
class StockMovimentType extends AppModel {
	var $name = 'StockMovimentType';
	var $useDbConfig = 'tuna';
	var $displayField = 'stock_moviment_type_structure';
	var $order = 'stock_moviment_type_structure';
	
	var $virtualFields = array(
		'stock_moviment_type_structure' => 'fn_stock_moviment_type_structure(StockMovimentType.id)'
		);
		
	var $validate = array(
		'stock_moviment_operation_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'stock_moviment_type_name' => array(
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

	var $belongsTo = array(
		'ParentStockMovimentType' => array(
			'className' => 'ParentStockMovimentType',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'StockMovimentOperation' => array(
			'className' => 'StockMovimentOperation',
			'foreignKey' => 'stock_moviment_operation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'StockMoviment' => array(
			'className' => 'StockMoviment',
			'foreignKey' => 'stock_moviment_type_id',
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