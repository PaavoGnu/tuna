<?php
class ServiceOrderStepOpeningUser extends AppModel {
	var $name = 'ServiceOrderStepOpeningUser';
	var $useDbConfig = 'tuna';
	var $useTable = 'users';
	var $displayField = 'user_name';
	
	var $virtualFields = array(
		'user_name' => 'IFNULL((SELECT Entity.entity_name FROM entities as Entity WHERE Entity.id = ServiceOrderStepOpeningUser.entity_id), ServiceOrderStepOpeningUser.user_login)'
		);
	
	var $belongsTo = array(
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
			'className' => 'ServiceOrderStep',
			'foreignKey' => 'service_order_step_opening_user_id',
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