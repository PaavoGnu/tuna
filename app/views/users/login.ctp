<h2>Login</h2>
<?php
  echo $session->flash();
  echo $session->flash('auth');

  echo $form->create('User', array('action' => 'login'));

  echo $form->input('user_login', array('label'=>'Login'));
  echo $form->input('user_password', array('label'=>'Senha', 'type'=>'password'));

  echo $form->end('Login');
?>
