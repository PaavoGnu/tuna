<?php
class ServiceOrder extends AppModel {
	var $name = 'ServiceOrder';
	var $useDbConfig = 'tuna';
	var $displayField = 'id';
	
	var $order = array(
			'service_order_cancellation_date',
			'service_order_evaluation_date',
			'service_order_close_date',
			'service_order_routing_date',
			'service_order_priority_type_id' => 'DESC',
			'service_order_opening_date'
			);
	
	var $swModelFields = array(
		'id' => array(
			'fieldLabel' => 'ID',
			'fieldEmpty' => true,	

			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'enterprise_id' => array(
			'fieldLabel' => 'Empresa',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),	
		'entity_group_id' => array(
			'fieldLabel' => 'Grupo de Entidade',
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
		'entity_contact_id' => array(
			'fieldLabel' => 'Contato',
			'fieldEmpty' => true,

			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_priority_type_id' => array(
			'fieldLabel' => 'Prioridade',
			'fieldEmpty' => true,

			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_type_id' => array(
			'fieldLabel' => 'Tipo',
			'fieldEmpty' => true,

			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_warranty' => array(
			'fieldLabel' => 'Garantia',
			
			'filter' => false,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_opening_date' => array(
			'fieldLabel' => 'Data de Abertura',
			'fieldType' => 'datetime',
			'fieldDateFormat' => 'DMY', 
			'fieldTimeFormat' => '24',
			'fieldMinYear' => '2000',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'between',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_opening_description' => array(
			'fieldLabel' => 'Descrição',
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_opening_observation' => array(
			'fieldLabel' => 'Observação',
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
		'entity_technician_id' => array(
			'fieldLabel' => 'Técnico',
			'fieldEmpty' => true,

			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_routing_date' => array(
			'fieldLabel' => 'Data de Encaminhamento',
			'fieldType' => 'datetime',
			'fieldDateFormat' => 'DMY', 
			'fieldTimeFormat' => '24',
			'fieldMinYear' => '2000',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'between',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_cancellation_date' => array(
			'fieldLabel' => 'Data de Cancelamento',
			'fieldType' => 'datetime',
			'fieldDateFormat' => 'DMY', 
			'fieldTimeFormat' => '24',
			'fieldMinYear' => '2000',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'between',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_cancellation_description' => array(
			'fieldLabel' => 'Motivo',
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_close_date' => array(
			'fieldLabel' => 'Data de Encerramento',
			'fieldType' => 'datetime',
			'fieldDateFormat' => 'DMY', 
			'fieldTimeFormat' => '24',
			'fieldMinYear' => '2000',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'between',
			'filterData' => null,
			'filterCondition' => null,
		), 
		'service_order_close_description' => array(
			'fieldLabel' => 'Solução',
			
			'filter' => true,
			'filterType' => 'like',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_evaluation_date' => array(
			'fieldLabel' => 'Data de Avaliação',
			'fieldType' => 'datetime',
			'fieldDateFormat' => 'DMY', 
			'fieldTimeFormat' => '24',
			'fieldMinYear' => '2000',
			'fieldEmpty' => true,
			
			'filter' => true,
			'filterType' => 'between',
			'filterData' => null,
			'filterCondition' => null,
		),
		'service_order_evaluation_type_id' => array(
			'fieldLabel' => 'Tipo de Avaliação',
			'fieldEmpty' => true,

			'filter' => true,
			'filterType' => 'equal',
			'filterData' => null,
			'filterCondition' => null,
		),
	);	
		
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
		'enterprise_unit_id' => array(
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
		'entity_contact_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'service_order_priority_type_id' => array(
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
		'EnterpriseUnit' => array(
			'className' => 'EnterpriseUnit',
			'foreignKey' => 'enterprise_unit_id',
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
		'EntityContact' => array(
			'className' => 'EntityContact',
			'foreignKey' => 'entity_contact_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderPriorityType' => array(
			'className' => 'ServiceOrderPriorityType',
			'foreignKey' => 'service_order_priority_type_id',
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
		'ServiceOrderEvaluationEntityGroup' => array(
			'className' => 'ServiceOrderEvaluationEntityGroup',
			'foreignKey' => 'service_order_evaluation_entity_group_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderEvaluationEntity' => array(
			'className' => 'ServiceOrderEvaluationEntity',
			'foreignKey' => 'service_order_evaluation_entity_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderEvaluationType' => array(
			'className' => 'ServiceOrderEvaluationType',
			'foreignKey' => 'service_order_evaluation_type_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'ServiceOrderEvaluationUser' => array(
			'className' => 'ServiceOrderEvaluationUser',
			'foreignKey' => 'service_order_evaluation_user_id',
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
		),
		'ServiceOrdersStockMoviment' => array(
			'className' => 'ServiceOrdersStockMoviment',
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
		'ServiceOrdersAssetMoviment' => array(
			'className' => 'ServiceOrdersAssetMoviment',
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
		),
		'AssetMoviment' => array(
			'className' => 'AssetMoviment',
			'joinTable' => 'service_orders_asset_moviments',
			'foreignKey' => 'service_order_id',
			'associationForeignKey' => 'asset_moviment_id',
			'unique' => true,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
			'deleteQuery' => '',
			'insertQuery' => ''
		),
	);
		
	function getOpenedConditions() {
		return array('
			ServiceOrder.service_order_opening_date IS NOT NULL and
			ServiceOrder.service_order_routing_date IS NULL and
			ServiceOrder.service_order_cancellation_date IS NULL and
			ServiceOrder.service_order_close_date IS NULL and
			ServiceOrder.service_order_evaluation_date IS NULL and
			fn_service_order_step_count(ServiceOrder.id,1) = 0');
	}
	
	function getRoutedConditions() {
		return array('
			ServiceOrder.service_order_opening_date IS NOT NULL and
			ServiceOrder.service_order_routing_date IS NOT NULL and
			ServiceOrder.service_order_cancellation_date IS NULL and
			ServiceOrder.service_order_close_date IS NULL and
			ServiceOrder.service_order_evaluation_date IS NULL and
			fn_service_order_step_count(ServiceOrder.id,1) = 0');
	}
	
	function getPositionedConditions() {
		return array('
			ServiceOrder.service_order_opening_date IS NOT NULL and
			ServiceOrder.service_order_routing_date IS NOT NULL and
			ServiceOrder.service_order_cancellation_date IS NULL and
			ServiceOrder.service_order_close_date IS NULL and
			ServiceOrder.service_order_evaluation_date IS NULL and
			fn_service_order_step_count(ServiceOrder.id,1) > 0');
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
	
	function countPositioned() {
		$count = $this->find('count', array('conditions' => $this->getPositionedConditions()));
		
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
	
	function getOpeningDate()
	{ 
		return $this->data['ServiceOrder']['service_order_opening_date'];
    }
}
?>