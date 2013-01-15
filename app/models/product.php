<?php
class Product extends AppModel {
	var $name = 'Product';
	var $useDbConfig = 'tuna';
	var $displayField = 'product_structure';
	var $order = 'product_structure';
	
	var $swModelFields = array(
		'id' => array(
			'fieldLabel' => 'ID',
			'fieldType' => 'text',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'product_type_id' =>  array(
			'fieldLabel' => 'Tipo',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'product_brand_id' =>  array(
			'fieldLabel' => 'Marca',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'product_name' => array(
			'fieldLabel' => 'Nome',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
	);
	
	var $virtualFields = array(
		'product_structure' => 'fn_product_structure(Product.id)'
		);
		
	var $validate = array(
		'product_type_id' => array(
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
		'product_brand_id' => array(
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
		'product_name' => array(
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
		'ProductType' => array(
			'className' => 'ProductType',
			'foreignKey' => 'product_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ProductBrand' => array(
			'className' => 'ProductBrand',
			'foreignKey' => 'product_brand_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'StockMovimentItem' => array(
			'className' => 'StockMovimentItem',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'EntityProduct' => array(
			'className' => 'EntityProduct',
			'foreignKey' => 'product_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
		'ServiceOrderProduct' => array(
			'className' => 'ServiceOrderProduct',
			'foreignKey' => 'product_id',
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