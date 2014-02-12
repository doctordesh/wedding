<?php

namespace Lannor\Wedding\Controllers\Wedding;

use Lannor\Wedding\Repos\InviteRepository;
use Lannor\Wedding\Models\Invite;

class InvitesController extends \Lannor\Wedding\Controllers\WeddingController
{
  public function edit($params) {
    $this->invite = $this->repo->find($params['invite']['id']);
  }

  public function update($params) {
    $this->invite = Invite::loadByValues($params['invite']);
    if($this->repo->save($this->invite)) {
      $this->notice('Tack för din anmälan!');
      $this->redirect('/wedding/invite/' . $this->invite->id . '/edit');
    } else {
      $this->template = '/wedding/invites/edit';
    }
  }
}