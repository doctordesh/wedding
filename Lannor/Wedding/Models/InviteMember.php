<?php

namespace Lannor\Wedding\Models;

class InviteMember extends \Lannor\Wedding\System\Model
{
  protected $id;
  protected $invite_id;
  protected $name;
  protected $accepted;
  protected $allergies;

  protected $__validate = [
    'int'  => ['id', 'invite_id']
  ];
}
