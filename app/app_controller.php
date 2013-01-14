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
		$appVersion = '0.2.0b';
		
		$ownerName = 'Tag Brasil';
		$ownerURL = 'www.tagbrasil.com.br';
		
		$customerName = 'Google';
		$customerURL = 'www.google.com.br';
	
		// FIM das variáveis da Aplicação, Proprietário e Cliente.
		
		// ...
		
		// Configuração do componente Auth (Autorização e Segurança).
		
		$this->Auth->fields = array(
			'username' => 'user_login',
			'password' => 'user_password'
		);
		
		$this->Auth->authorize = 'actions';
		
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        
		$this->Auth->actionPath = 'controllers/';

		$this->Auth->authError = 'Área restrita, favor efetuar o login.';
		$this->Auth->loginError = 'Nome de usuário ou senha inválidos.';
		
		$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        
		$auth = $this->Auth;

		// FIM da configuração do componente Auth.
		
		$this->set(compact('auth', 'appTitle', 'appVersion', 'ownerName', 'ownerURL', 'customerName', 'customerURL'));
	}
}
?>
