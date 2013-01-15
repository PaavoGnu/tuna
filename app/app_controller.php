<?php
class AppController extends Controller {
	var $name = 'Tuna';
	var $components = array('Session', 'Auth', 'Acl', 'RequestHandler');
	
	var $helpers = array('Session', 'Html', 'Form', 'Js',
		'SwModel', 'SwModelFilter',
		'SwIndex',
		'SwExportCsv'
	);
	
	function beforeFilter(){
		$this->disableCache(); // Desabilita totalmente o cache nas páginas.
		date_default_timezone_set("Brazil/East"); // Define o fuso-horário padrão.
		
		// Variáveis da Aplicação, Proprietário e Cliente.
		
		$appTitle = 'Tuna - WBMS';
		$appVersion = '0.3.6b';
		$appTitleVersion = $appTitle . ' (' . $appVersion . ')';
		
		$frameWorkTitle = 'CakePHP';
		$frameWorkVersion = '1.3.3';
		$frameWorkURL = 'http://www.cakephp.org/';
		
		$ownerName = 'Tag Brasil';
		$ownerURL = 'http://www.tagbrasil.com.br/';
		
		$customerName = 'Google';
		$customerURL = 'http://www.google.com.br/';
	
		// FIM das variáveis da Aplicação, Proprietário e Cliente.
		
		// ...
		
		// Configuração do componente Auth (Autorização e Segurança).
		
		$this->Auth->fields = array(
			'username' => 'user_login',
			'password' => 'user_password'
		);
		
		// $this->Auth->authorize = 'actions'; // Comente essa linha para liberar o acesso geral ao sistema.
		
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        
		$this->Auth->actionPath = 'controllers/';

		$this->Auth->authError = 'Área restrita, favor efetuar o login.';
		$this->Auth->loginError = 'Nome de usuário ou senha inválidos.';
		
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        
		$userId = $this->Auth->user('id');
		$userName = $this->Auth->user('user_name');

		// FIM da configuração do componente Auth.
		
		$this->set(compact(
			'appTitle', 'appVersion', 'appTitleVersion', 
			'frameWorkTitle', 'frameWorkVersion', 'frameWorkURL', 
			'ownerName', 'ownerURL', 
			'customerName', 'customerURL',
			'userId', 'userName'
		));
	}
	
	function index() {	
	
		$conditions = array();
		
		$swModelFields = $this->{$this->modelClass}->swModelFields;
		
		foreach($swModelFields as $k => $v) :
			if ($swModelFields[$k]['filter']) {
				
				$fieldArgName = 'filter_' . $k . '_' . $swModelFields[$k]['filterType'];
				
				if (isset($this->passedArgs[$fieldArgName])) {
					$fieldArgValue = $this->passedArgs[$fieldArgName];

					if (isset($swModelFields[$k]['fieldType'])) {
						switch($swModelFields[$k]['fieldType']) {
							case 'text':
								switch($swModelFields[$k]['filterType']) {
									case 'equal':
										$fieldArgCondition = array($this->modelClass . "." . $k . " = '" . $fieldArgValue . "'");
										break;

									case 'like':
										$fieldArgCondition = array($this->modelClass . "." . $k . " LIKE '%" . $fieldArgValue . "%'");
										break;
								}
								break;
								
							case 'datetime':
								switch($swModelFields[$k]['filterType']) {
									case 'between':
										$fieldArgValueBetweenFrom =
											substr($fieldArgValue, 00, 4) . '-' .
											substr($fieldArgValue, 04, 2) . '-' .
											substr($fieldArgValue, 06, 2) . ' ' .
											substr($fieldArgValue, 08, 2) . ':' .
											substr($fieldArgValue, 10, 2) . ':00';
											
										$fieldArgValueBetweenTo =
											substr($fieldArgValue, 17, 4) . '-' .
											substr($fieldArgValue, 21, 2) . '-' .
											substr($fieldArgValue, 23, 2) . ' ' .
											substr($fieldArgValue, 25, 2) . ':' .
											substr($fieldArgValue, 27, 2) . ':00';
											
										$fieldArgValueBetween = $fieldArgValueBetweenFrom . "' AND '" . $fieldArgValueBetweenTo;										
										$fieldArgCondition = array($this->modelClass . "." . $k . " BETWEEN '" . $fieldArgValueBetween . "'");
										
										break;
								}
								break;
						}
					} else {
						switch($swModelFields[$k]['filterType']) {
							case 'equal':
								$fieldArgCondition = array($this->modelClass . "." . $k . " = '" . $fieldArgValue . "'");
								break;

							case 'like':
								$fieldArgCondition = array($this->modelClass . "." . $k . " LIKE '%" . $fieldArgValue . "%'");
								break;
						}
					}
										
					$conditions = array_merge($conditions, $fieldArgCondition);
				}				
			}
		endforeach;
		
		$this->paginate = array('conditions' => $conditions);
	}
	
	function indexFilter() {
		if (!empty($this->data)) {
			$this->{$this->modelClass}->setModelFilterData($this->data);			
						
			$this->redirect(array_merge(array('action' => 'index'), $this->{$this->modelClass}->setModelFilterUrl($this->data)));
		}		
		
		$swModelFields = $this->{$this->modelClass}->swModelFields;		
		$this->set(compact('swModelFields'));	
	}
	
	function indexExportCsv() {
		$this->{$this->modelClass}->recursive = 0;
		$data = $this->{$this->modelClass}->find('all');
		
		$this->set(compact('data'));
		
		$this->layout = 'csv';
		$this->render();
	} 
}
?>
