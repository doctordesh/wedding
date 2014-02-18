<?php

namespace Lannor\Wedding\Controllers;

class AdminController extends \Lannor\Wedding\System\Controller
{
  public $layout = 'admin';

  public function before() {
    $this->authenticate();
  }

  private function authenticate() {
    if(!isset($_SESSION['admin'])) {
      $this->redirect('/admin');
    }
  }
}
