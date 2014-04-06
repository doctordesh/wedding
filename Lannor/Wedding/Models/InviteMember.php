<?php

namespace Lannor\Wedding\Models;

class InviteMember extends \Lannor\Wedding\System\Model
{
  protected $id;
  protected $invite_id;
  protected $name;
  protected $message;
  protected $accepted;
  protected $allergies;
  protected $speech;
  protected $relation;
  protected $time;
  protected $gear;
  protected $misc;

  protected $__validate = [
    'int'  => ['id', 'invite_id']
  ];
}
