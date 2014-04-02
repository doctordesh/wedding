<?php

namespace Lannor\Wedding\Models;

class Item extends \Lannor\Wedding\System\Model
{
  protected $id;
  protected $title;
  protected $note;
  protected $url;
  protected $booked;
  protected $invite_id;

  protected $__validate = [
    'int'  => ['id', 'booked']
  ];
}
