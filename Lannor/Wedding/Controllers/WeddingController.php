<?php

namespace Lannor\Wedding\Controllers;

class WeddingController extends \Lannor\Wedding\System\Controller
{
  public $layout = 'wedding';

  public function before() {
    $this->authenticate();
  }

  protected function authenticate() {
    if(!isset($_SESSION['invite'])) {
      $this->returnToLogin();
    }
  }

  protected function returnToLogin() {
    $this->redirect('/');
  }

  protected function hasUserLevel($user_level) {
    if(!isset($_SESSION['user_level'])) {
      return false;
    }

    return $_SESSION['user_level'] >= $user_level;
  }
}
