<?php

namespace Lannor\Wedding\Controllers;

use Lannor\Wedding\Repos\InviteRepository;

class WeddingController extends \Lannor\Wedding\System\Controller
{
  public $layout = 'wedding';

  public function initialize() {
    $this->repo = new InviteRepository($this->db);
  }

  public function before() {
    $this->authenticate();
  }

  private function authenticate() {
    if(!isset($_SESSION['invite'])) {
      $this->redirect('/');
    }
  }
}
