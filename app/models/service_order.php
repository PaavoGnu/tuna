<?php
class ServiceOrder extends AppModel {
	var $name = 'ServiceOrder';
	var $useDbConfig = 'tuna';
	var $displayField = 'id';
	var $validate = array(
		'enterprise_id' => array(
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
		'entity_group_id' => array(
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
		'service_order_priority_id' => array(
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
		'service_order_type_id' => array(
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
		'service_order_warranty' => array(
			'boolean' => array(
				'rule' => array('boolean'),
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
		'service_order_opening_description' => array(
			'notempty' => array(
				'rule' => array('notempty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_order_opening_user_id' => array(
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
		'Enterprise' => array(
			'className' => 'Enterprise',
			'foreignKey' => 'enterprise_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EntityGroup' => array(
			'className' => 'EntityGroup',
			'foreignKey' => 'entity_group_id',
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
		),
		'ServiceOrderPriority' => array(
			'className' => 'ServiceOrderPriority',
			'foreignKey' => 'service_order_priority_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderType' => array(
			'className' => 'ServiceOrderType',
			'foreignKey' => 'service_order_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderOpeningUser' => array(
			'className' => 'ServiceOrderOpeningUser',
			'foreignKey' => 'service_order_opening_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'EntityTechnician' => array(
			'className' => 'EntityTechnician',
			'foreignKey' => 'entity_technician_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderRoutingUser' => array(
			'className' => 'ServiceOrderRoutingUser',
			'foreignKey' => 'service_order_routing_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderCancellationUser' => array(
			'className' => 'ServiceOrderCancellationUser',
			'foreignKey' => 'service_order_cancellation_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderCloseUser' => array(
			'className' => 'ServiceOrderCloseUser',
			'foreignKey' => 'service_order_close_user_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	var $hasMany = array(
		'ServiceOrderStep' => array(
			'className' => 'ServiceOrderStep',
			'foreignKey' => 'service_order_id',
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
			'foreignKey' => 'service_order_id',
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
		'StockMoviment' => array(
			'className' => 'StockMoviment',
			'joinTable' => 'service_orders_stock_moviments',
			'foreignKey' => 'service_order_id',
			'associationForeignKey' => 'stock_moviment_id',
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
	
	
	function getOrder() {
		return array('
			ServiceOrder.service_order_opening_date' => 'DESC');
	}
		
	function getOpenedConditions() {
		return array('
			ServiceOrder.service_order_opening_date IS NOT NULL and
			ServiceOrder.service_order_routing_date IS NULL and
			ServiceOrder.service_order_cancellation_date IS NULL and
			ServiceOrder.service_order_close_date IS NULL and
			ServiceOrder.service_order_evaluation_date IS NULL');
	}
	
	function getRoutedConditions() {
		return array('
			ServiceOrder.service_order_opening_date IS NOT NULL and
			ServiceOrder.service_order_routing_date IS NOT NULL and
			ServiceOrder.service_order_cancellation_date IS NULL and
			ServiceOrder.service_order_close_date IS NULL and
			ServiceOrder.service_order_evaluation_date IS NULL');
	}
	
	function getCanceledConditions() {
		return array('
			ServiceOrder.service_order_cancellation_date IS NOT NULL');
	}
	
	function getClosedConditions() {
		return array('
			ServiceOrder.service_order_opening_date IS NOT NULL and
			ServiceOrder.service_order_routing_date IS NOT NULL and
			ServiceOrder.service_order_cancellation_date IS NULL and
			ServiceOrder.service_order_close_date IS NOT NULL and
			ServiceOrder.service_order_evaluation_date IS NULL');
	}
	
	function getEvaluatedConditions() {
		return array('
			ServiceOrder.service_order_opening_date IS NOT NULL and
			ServiceOrder.service_order_routing_date IS NOT NULL and
			ServiceOrder.service_order_cancellation_date IS NULL and
			ServiceOrder.service_order_close_date IS NOT NULL and
			ServiceOrder.service_order_evaluation_date IS NOT NULL');
	}
	
	function countAll() {
		$count = $this->find('count');
		
		return $count;
	}
	
	function countOpened() {
		$count = $this->find('count', array('conditions' => $this->getOpenedConditions()));
		
		return $count;
	}
	
	function countRouted() {
		$count = $this->find('count', array('conditions' => $this->getRoutedConditions()));
		
		return $count;
	}
	
	function countCanceled() {
		$count = $this->find('count', array('conditions' => $this->getCanceledConditions()));
		
		return $count;
	}
	
	function countClosed() {
		$count = $this->find('count', array('conditions' => $this->getClosedConditions()));
		
		return $count;
	}
	
	function countEvaluated() {
		$count = $this->find('count', array('conditions' => $this->getEvaluatedConditions()));
		
		return $count;
	}
}
?>