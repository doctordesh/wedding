<?php

namespace Lannor\Wedding\Controllers;

class AdminSessionsController extends \Lannor\Wedding\System\Controller
{
  public function new_() {

  }

  public function authenticate($params) {
    $password = sha1($params['password']);
    foreach($this->config->users as $user) {
      if(
        $user->username === $params['username']
        AND
        $user->password === $password
      ) {
        $_SESSION['admin'] = $user;
        $this->redirect('/admin/invites');
        break;
      }
    }

    $this->template = 'admin_sessions/new_';
  }

  public function destroy() {
    unset($_SESSION['admin']);
    $this->redirect('/admin');
  }
}
