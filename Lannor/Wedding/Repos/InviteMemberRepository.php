<?php

namespace Lannor\Wedding\Repos;

class InviteMemberRepository extends \Lannor\Base\Repository
{
  const TABLE_NAME = 'invite_members';
  const CLASS_NAME = '\Lannor\Wedding\Models\InviteMember';

  public function allByAccepted($accepted) {
    $sql = "SELECT * FROM " . self::TABLE_NAME . " WHERE " . self::TABLE_NAME . ".accepted = ? ORDER BY " . self::TABLE_NAME . ".invite_id ASC";
    return $this->select($sql, [$accepted], self::TABLE_NAME, self::CLASS_NAME);
  }
}