<?php

namespace Lannor\Wedding\Controllers\Wedding;

use Lannor\Wedding\Repos\InviteRepository;
use Lannor\Wedding\Models\Invite;

class InvitesController extends \Lannor\Wedding\Controllers\WeddingController
{
  public function index() {
    $this->pending  = $this->member_repo->allByAccepted('PENDING');
    $this->accepted = $this->member_repo->allByAccepted('ACCEPTED');
    $this->declined = $this->member_repo->allByAccepted('DECLINED');

    $this->stats = new \stdClass();
    $this->stats->pending  = count($this->pending);
    $this->stats->accepted = count($this->accepted);
    $this->stats->declined = count($this->declined);
    $this->stats->total    = $this->stats->pending + $this->stats->accepted + $this->stats->declined;
  }

  public function edit($params) {
    if($params['invite']['id'] != $_SESSION['invite']) {
      $this->returnToLogin();
    }
    $this->invite = $this->invite_repo->find($params['invite']['id']);
  }

  public function update($params) {
    $this->invite = Invite::loadByValues($params['invite']);
    if($this->invite_repo->save($this->invite)) {
      $this->notice('Tack för din anmälan!');
      $this->redirect('/wedding/invites/' . $this->invite->id . '/edit');
    } else {
      $this->template = '/wedding/invites/edit';
    }
  }
}