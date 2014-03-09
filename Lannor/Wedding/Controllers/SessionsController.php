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
      $_SESSION['invite']     = $invite->id;
      $_SESSION['user_level'] = $invite->user_level;
      $this->redirect('/wedding/invites/edit');
    } else {
      $this->template = 'main/index';
      $this->error    = 'Koden du angav hittades inte. Försök igen!';
    }
  }

  public function destroy($params) {
    unset($_SESSION['invite']);
    $this->redirect('/');
  }
}