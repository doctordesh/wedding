<?php

namespace Lannor\Wedding\Controllers;

class AdminSessionsController extends \Lannor\Wedding\System\Controller
{
  public function new_() {

  }

  public function authenticate($params) {
    $password = sha1($params['password']);
    if($params['username'] === $this->config->admin->username AND $password === $this->config->admin->password) {
      $_SESSION['admin'] = 1;
      $this->redirect('/admin/invites');
    } else {
      $this->template = 'admin_sessions/new_';
    }
  }

  public function destroy() {
    unset($_SESSION['admin']);
    $this->redirect('/admin');
  }
}
