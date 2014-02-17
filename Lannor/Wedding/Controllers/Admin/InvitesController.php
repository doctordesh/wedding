<?php

namespace Lannor\Wedding\Controllers\Admin;

use Lannor\Wedding\Repos\InviteMemberRepository;
use Lannor\Wedding\Models\Invite;

class InvitesController extends \Lannor\Wedding\Controllers\AdminController
{
  public function initialize() {
    $this->repo = new InviteMemberRepository($this->db);
  }

  public function index() {
    $this->pending  = $this->repo->allByAccepted('PENDING');
    $this->accepted = $this->repo->allByAccepted('ACCEPTED');
    $this->declined = $this->repo->allByAccepted('DECLINED');

    $this->stats = new \stdClass();
    $this->stats->pending  = count($this->pending);
    $this->stats->accepted = count($this->accepted);
    $this->stats->declined = count($this->declined);
    $this->stats->total    = $this->stats->pending + $this->stats->accepted + $this->stats->declined;
  }
}