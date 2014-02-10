<?php

namespace Lannor\Wedding\Models;

class Invite extends \Lannor\Wedding\System\Model
{
  public static $has_many = ['members' => '\Lannor\Wedding\Models\InviteMember'];

  protected $id;
  protected $code;
  protected $members;

  protected $__validate = [
    'int'  => ['id']
  ];

  public function __construct() {
    $this->validate();
  }

  public static function loadByValues($values) {
    $invite = new Invite();

    $members = [];
    foreach($values['members'] as $member) {
      $members[] = InviteMember::loadByValues($member);
    }
    unset($values['members']);

    $invite->id      = isset($values['id'])   ? $values['id']   : null;
    $invite->code    = isset($values['code']) ? $values['code'] : null;
    $invite->members = $members;

    $invite->validate();
    return $invite;
  }
}
