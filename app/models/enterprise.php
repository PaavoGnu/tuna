<?php
class Enterprise extends AppModel {
	var $name = 'Enterprise';
	var $useDbConfig = 'tuna';
	var $displayField = 'enterprise_structure';
	var $order = 'enterprise_structure';
	
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
		'parent_id' =>  array(
			'fieldLabel' => 'Grupo',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'entity_id' => array(
			'fieldLabel' => 'Entidade',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
	);
	
	var $virtualFields = array(
		'enterprise_structure' => 'fn_enterprise_structure(Enterprise.id)'
		);
		
	var $validate = array(
		'entity_id' => array(
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
	);
	//The Associations below have been created with all possible keys, those that are not needed can be removed

	var $belongsTo = array(
		'ParentEnterprise' => array(
			'className' => 'ParentEnterprise',
			'foreignKey' => 'parent_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Entity' => array(
			'className' => 'Entity',
			'foreignKey' => 'entity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'ServiceOrder' => array(
			'className' => 'ServiceOrder',
			'foreignKey' => 'enterprise_id',
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
		'StockMoviment' => array(
			'className' => 'StockMoviment',
			'foreignKey' => 'enterprise_id',
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
		'SystemVersionDefinition' => array(
			'className' => 'SystemVersionDefinition',
			'foreignKey' => 'enterprise_id',
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


	var $hasAndBelongsToMany = array(
		'SystemVersion' => array(
			'className' => 'SystemVersion',
			'joinTable' => 'system_versions_enterprises',
			'foreignKey' => 'enterprise_id',
			'associationForeignKey' => 'system_version_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		)
	);

}
?>