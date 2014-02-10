<?php

namespace Lannor\Wedding\Controllers;

use Lannor\Wedding\Repos\InviteRepository;

class SessionsController extends \Lannor\Wedding\System\Controller
{
  public function initialize() {
    $this->repo = new InviteRepository($this->db);
  }

  public function authenticate($params) {
    $invite = $this->repo->findByCode($params['invite']['code']);
    if($invite) {
      $_SESSION['invite'] = $invite->id;
      $this->redirect('/wedding/invite/' . $invite->id . '/edit');
    } else {
      var_dump($_SERVER);
    }
  }

  public function destroy($params) {
    unset($_SESSION['invite']);
    $this->redirect('/');
  }
}