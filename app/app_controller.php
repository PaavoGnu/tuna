<?php
class AppController extends Controller {
	var $name = 'Tuna';
	var $components = array('Session', 'Auth', 'Acl', 'RequestHandler');
	var $helpers = array('Session', 'Html', 'Form', 'Js');
	
	function beforeFilter(){
		$this->disableCache(); // Desabilita totalmente o cache nas páginas.
		date_default_timezone_set("Brazil/East"); // Define o fuso-horário padrão.
		
		// Variáveis da Aplicação, Proprietário e Cliente.
		
		$appTitle = 'Tuna - WBMS';
		$appVersion = '0.3.3b';
		
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
        
		$auth = $this->Auth;

		// FIM da configuração do componente Auth.
		
		$this->set(compact('auth', 'appTitle', 'appVersion', 'frameWorkTitle', 'frameWorkVersion', 'frameWorkURL', 'ownerName', 'ownerURL', 'customerName', 'customerURL'));
	}
}
?>
