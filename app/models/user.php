<?php
class User extends AppModel {
	var $name = 'User';
	var $useDbConfig = 'tuna';
	var $displayField = 'user_name';
	
	var $actsAs = array('Acl' => array('type' => 'requester'));
	
	var $virtualFields = array(
		'user_name' => 'IFNULL((SELECT Entity.entity_name FROM entities as Entity WHERE Entity.id = User.entity_id), User.user_login)'
		);
	
	var $validate = array(
		'user_login' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'user_enabled' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
		'Entity' => array(
			'className' => 'Entity',
			'foreignKey' => 'entity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'StockMoviment' => array(
			'className' => 'StockMoviment',
			'foreignKey' => 'user_id',
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
		'Group' => array(
			'className' => 'Group',
			'joinTable' => 'users_groups',
			'foreignKey' => 'user_id',
			'associationForeignKey' => 'group_id',
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
	
	function parentNode() {
		if (!$this->id && empty($this->data)) {
			return null;
		}
		
		return array('Group' => array('id' => 1));
		
		/*
		foreach ($this->data['Group'] as $group):			
			if (isset($group['group_id'])) {
				$groupId = $group['group_id'];
			} else {
				$groupId = $this->field('group_id');
			}
		
			if (!$groupId) {
				return null;
			} else {
				return array('Group' => array('group_id' => $groupId));
			}
		endforeach;
		*/
	}
}
?>