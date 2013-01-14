<?php
class ServiceOrderStepCloseUser extends AppModel {
	var $name = 'ServiceOrderStepCloseUser';
	var $useDbConfig = 'tuna';
	var $useTable = 'users';
	var $displayField = 'user_name';
	
	var $virtualFields = array(
		'user_name' => 'IFNULL((SELECT Entity.entity_name FROM entities as Entity WHERE Entity.id = ServiceOrderStepCloseUser.entity_id), ServiceOrderStepCloseUser.user_login)'
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
			'foreignKey' => 'service_order_step_close_user_id',
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