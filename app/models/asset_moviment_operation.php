<?php
class AssetMovimentOperation extends AppModel {
	var $name = 'AssetMovimentOperation';
	var $useDbConfig = 'tuna';
	var $displayField = 'asset_moviment_operation_name';
	var $order = 'asset_moviment_operation_name';
	
	var $validate = array(
		'asset_moviment_operation_name' => array(
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
		'AssetMoviment' => array(
			'className' => 'AssetMoviment',
			'foreignKey' => 'asset_moviment_operation_id',
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