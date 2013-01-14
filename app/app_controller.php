<?php
class AppController extends Controller {
	var $name = 'Tuna';
	var $components = array('Session', 'Auth', 'Acl', 'RequestHandler');
	var $helpers = array('Session', 'Html', 'Form', 'Js');
	
	function beforeFilter(){
		date_default_timezone_set("Brazil/East");
		
		$this->Auth->fields = array(
		'username' => 'user_login',
		'password' => 'user_password'
		);
		
		$this->Auth->authorize = 'actions';
		
		$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
        $this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
        
		$this->Auth->actionPath = 'controllers/';

		$this->Auth->authError = 'Área restrita, favor efetuar o login.';
		$this->Auth->loginError = 'Nome de usuário ou senha inválidos.';
		
		$auth = $this->Auth;
		
		$this->set(compact('auth'));
	}
}
?>
