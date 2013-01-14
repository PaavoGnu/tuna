<?php
class AssetMovimentType extends AppModel {
	var $name = 'AssetMovimentType';
	var $useDbConfig = 'tuna';
	var $displayField = 'asset_moviment_type_structure';
	var $order = 'asset_moviment_type_structure';
	
	var $virtualFields = array(
		'asset_moviment_type_structure' => 'fn_asset_moviment_type_structure(AssetMovimentType.id)'
		);
		
	var $validate = array(
		'asset_moviment_operation_id' => array(
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
		'asset_moviment_type_name' => array(
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
		'ParentAssetMovimentType' => array(
			'className' => 'ParentAssetMovimentType',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'AssetMovimentOperation' => array(
			'className' => 'AssetMovimentOperation',
			'foreignKey' => 'asset_moviment_operation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'AssetMoviment' => array(
			'className' => 'AssetMoviment',
			'foreignKey' => 'asset_moviment_type_id',
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