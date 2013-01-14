<?php
class UsersController extends AppController {

	var $name = 'Users';

	function beforeFilter() {
		parent::beforeFilter();
		
		//$this->Auth->allow(array('*'));
	}

	function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

	function view($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Usuário inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->set('user', $this->User->read(null, $id));
	}

	function register() {
		if (!empty($this->data)) {
		    if ($this->data['User']['user_password'] == $this->Auth->password($this->data['User']['user_password_confirmation'])) {
				$this->User->create();
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('Usuário salvo.', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('O usuário não pôde ser salvo, tente novamente.', true));
				}
			} else {
				$this->Session->setFlash(__('As senhas não coincidem, tente novamente.', true));
			}
		}
		$entities = $this->User->Entity->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('entities', 'groups'));
	}
	
	function edit($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Usuário inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		if (!empty($this->data)) {
			if ($this->User->save($this->data)) {
				$this->Session->setFlash(__('Usuário salvo.', true));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('O usuário não pôde ser salvo, tente novamente.', true));
			}
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
		
		$entities = $this->User->Entity->find('list');
		$groups = $this->User->Group->find('list');
		$this->set(compact('entities', 'groups'));
	}
    
	function changePassword($id = null) {
		if (!$id && empty($this->data)) {
			$this->Session->setFlash(__('Usuário inválido.', true));
			$this->redirect(array('action' => 'index'));
		}
		if ($this->data['User']['user_password'] == $this->data['User']['user_password_confirmation']) {
			if (!empty($this->data)) {
				$this->data['User']['user_password'] = $this->Auth->password($this->data['User']['user_password']);
				
				if ($this->User->save($this->data)) {
					$this->Session->setFlash(__('Senha alterada.', true));
					$this->redirect(array('action' => 'index'));
				} else {
					$this->Session->setFlash(__('A senha não pôde ser alterada, tente novamente.', true));
				}
			}
		} else {
			$this->Session->setFlash(__('As senhas não coincidem, tente novamente.', true));
		}
		if (empty($this->data)) {
			$this->data = $this->User->read(null, $id);
		}
	}
	
	function erasePassword($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Usuário inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		
		$this->data = $this->User->read(null, $id);
		$this->data['User']['user_password'] = $this->Auth->password('');
			
		if ($this->User->save($this->data)) {
			$this->Session->setFlash(__('Senha zerada.', true));
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('A senha não pôde ser zerada, tente novamente.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function delete($id = null) {
		if (!$id) {
			$this->Session->setFlash(__('Usuário inválido.', true));
			$this->redirect(array('action'=>'index'));
		}
		if ($id != $this->Auth->user('id')) {
			if ($this->User->delete($id)) {
				$this->Session->setFlash(__('Usuário excluído.', true));
				$this->redirect(array('action'=>'index'));
			}
		} else {
			$this->Session->setFlash(__('O usuário não pôde ser excluído, você está logado com ele no momento.', true));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('O usuário não pôde ser excluído, tente novamente.', true));
		$this->redirect(array('action' => 'index'));
	}
	
	function login() {
		if ($this->Session->read('Auth.User')) {
			$this->Session->setFlash('Login executado com sucesso. Seja bem-vindo.');
			$this->redirect('/', null, false);
		}
	}

	function logout() {
		$this->Session->setFlash('Logout executado com sucesso. Até mais.');
		$this->redirect($this->Auth->logout());
    }
	
	function acl() {
		$this->Acl->Aco->create(array('parent_id' => null, 'alias' => 'controllers'));
		$this->Acl->Aco->save();
		
		if (!Configure::read('debug')) {
			return $this->_stop();
		}
		$log = array();

		$aco =& $this->Acl->Aco;
		$root = $aco->node('controllers');
		if (!$root) {
			$aco->create(array('parent_id' => null, 'model' => null, 'alias' => 'controllers'));
			$root = $aco->save();
			$root['Aco']['id'] = $aco->id; 
			$log[] = 'Created Aco node for controllers';
		} else {
			$root = $root[0];
		}   

		App::import('Core', 'File');
		$Controllers = Configure::listObjects('controller');
		$appIndex = array_search('App', $Controllers);
		if ($appIndex !== false ) {
			unset($Controllers[$appIndex]);
		}
		$baseMethods = get_class_methods('Controller');
		$baseMethods[] = 'build_acl';

		$Plugins = $this->_getPluginControllerNames();
		$Controllers = array_merge($Controllers, $Plugins);

		// look at each controller in app/controllers
		foreach ($Controllers as $ctrlName) {
			$methods = $this->_getClassMethods($this->_getPluginControllerPath($ctrlName));

			// Do all Plugins First
			if ($this->_isPlugin($ctrlName)){
				$pluginNode = $aco->node('controllers/'.$this->_getPluginName($ctrlName));
				if (!$pluginNode) {
					$aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginName($ctrlName)));
					$pluginNode = $aco->save();
					$pluginNode['Aco']['id'] = $aco->id;
					$log[] = 'Created Aco node for ' . $this->_getPluginName($ctrlName) . ' Plugin';
				}
			}
			// find / make controller node
			$controllerNode = $aco->node('controllers/'.$ctrlName);
			if (!$controllerNode) {
				if ($this->_isPlugin($ctrlName)){
					$pluginNode = $aco->node('controllers/' . $this->_getPluginName($ctrlName));
					$aco->create(array('parent_id' => $pluginNode['0']['Aco']['id'], 'model' => null, 'alias' => $this->_getPluginControllerName($ctrlName)));
					$controllerNode = $aco->save();
					$controllerNode['Aco']['id'] = $aco->id;
					$log[] = 'Created Aco node for ' . $this->_getPluginControllerName($ctrlName) . ' ' . $this->_getPluginName($ctrlName) . ' Plugin Controller';
				} else {
					$aco->create(array('parent_id' => $root['Aco']['id'], 'model' => null, 'alias' => $ctrlName));
					$controllerNode = $aco->save();
					$controllerNode['Aco']['id'] = $aco->id;
					$log[] = 'Created Aco node for ' . $ctrlName;
				}
			} else {
				$controllerNode = $controllerNode[0];
			}

			//clean the methods. to remove those in Controller and private actions.
			foreach ($methods as $k => $method) {
				if (strpos($method, '_', 0) === 0) {
					unset($methods[$k]);
					continue;
				}
				if (in_array($method, $baseMethods)) {
					unset($methods[$k]);
					continue;
				}
				$methodNode = $aco->node('controllers/'.$ctrlName.'/'.$method);
				if (!$methodNode) {
					$aco->create(array('parent_id' => $controllerNode['Aco']['id'], 'model' => null, 'alias' => $method));
					$methodNode = $aco->save();
					$log[] = 'Created Aco node for '. $method;
				}
			}
		}
		if(count($log)>0) {
			debug($log);
		}
	}

	function _getClassMethods($ctrlName = null) {
		App::import('Controller', $ctrlName);
		if (strlen(strstr($ctrlName, '.')) > 0) {
			// plugin's controller
			$num = strpos($ctrlName, '.');
			$ctrlName = substr($ctrlName, $num+1);
		}
		$ctrlclass = $ctrlName . 'Controller';
		$methods = get_class_methods($ctrlclass);

		// Add scaffold defaults if scaffolds are being used
		$properties = get_class_vars($ctrlclass);
		if (array_key_exists('scaffold',$properties)) {
			if($properties['scaffold'] == 'admin') {
				$methods = array_merge($methods, array('admin_add', 'admin_edit', 'admin_index', 'admin_view', 'admin_delete'));
			} else {
				$methods = array_merge($methods, array('add', 'edit', 'index', 'view', 'delete'));
			}
		}
		return $methods;
	}

	function _isPlugin($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) > 1) {
			return true;
		} else {
			return false;
		}
	}

	function _getPluginControllerPath($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) == 2) {
			return $arr[0] . '.' . $arr[1];
		} else {
			return $arr[0];
		}
	}

	function _getPluginName($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) == 2) {
			return $arr[0];
		} else {
			return false;
		}
	}

	function _getPluginControllerName($ctrlName = null) {
		$arr = String::tokenize($ctrlName, '/');
		if (count($arr) == 2) {
			return $arr[1];
		} else {
			return false;
		}
	}

	function _getPluginControllerNames() {
		App::import('Core', 'File', 'Folder');
		$paths = Configure::getInstance();
		$folder =& new Folder();
		$folder->cd(APP . 'plugins');

		// Get the list of plugins
		$Plugins = $folder->read();
		$Plugins = $Plugins[0];
		$arr = array();

		// Loop through the plugins
		foreach($Plugins as $pluginName) {
			// Change directory to the plugin
			$didCD = $folder->cd(APP . 'plugins'. DS . $pluginName . DS . 'controllers');
			// Get a list of the files that have a file name that ends
			// with controller.php
			$files = $folder->findRecursive('.*_controller\.php');

			// Loop through the controllers we found in the plugins directory
			foreach($files as $fileName) {
				// Get the base file name
				$file = basename($fileName);

				// Get the controller name
				$file = Inflector::camelize(substr($file, 0, strlen($file)-strlen('_controller.php')));
				if (!preg_match('/^'. Inflector::humanize($pluginName). 'App/', $file)) {
					if (!App::import('Controller', $pluginName.'.'.$file)) {
						debug('Error importing '.$file.' for plugin '.$pluginName);
					} else {
						/// Now prepend the Plugin name ...
						// This is required to allow us to fetch the method names.
						$arr[] = Inflector::humanize($pluginName) . "/" . $file;
					}
				}
			}
		}
		return $arr;
	}
}
?>