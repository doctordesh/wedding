<?php

namespace Lannor\Wedding\Repos;

class InviteRepository extends \Lannor\Base\Repository
{
  const TABLE_NAME = 'invites';
  const CLASS_NAME = '\Lannor\Wedding\Models\Invite';

  public function findByCode($code) {
    $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE " . self::TABLE_NAME . ".code = ?";

    return $this->selectOne($sql, [$code], self::TABLE_NAME, self::CLASS_NAME);
  }
}