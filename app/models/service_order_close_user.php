<?php
class ServiceOrderCloseUser extends AppModel {
	var $name = 'ServiceOrderCloseUser';
	var $useDbConfig = 'tuna';
	var $useTable = 'users';
	var $displayField = 'user_name';
	
	var $virtualFields = array(
		'user_name' => 'IFNULL((SELECT Entity.entity_name FROM entities as Entity WHERE Entity.id = ServiceOrderCloseUser.entity_id), ServiceOrderCloseUser.user_login)'
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
			'className' => 'ServiceOrder',
			'foreignKey' => 'service_order_close_user_id',
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