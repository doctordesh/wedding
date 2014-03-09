<?php

namespace Lannor\Wedding\Repos;

class ItemRepository extends \Lannor\Base\Repository
{
  const TABLE_NAME = 'items';
  const CLASS_NAME = '\Lannor\Wedding\Models\Item';

  public function allByBooked($booked) {
    $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE " . self::TABLE_NAME . ".booked = ?";
    return $this->select($sql, [intval($booked)], self::TABLE_NAME, self::CLASS_NAME);
  }
}