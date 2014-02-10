<?php

namespace Lannor\Base;

use Lannor\Base\ToArrayInterface;

class Repository
{
  use SingPlur;

  protected $db;

  public function __construct(\PDO $db) {
    $this->db = $db;
  }

  public function find($id, $table_name = null, $class_name = null) {
    if($table_name === null) {
      $table_name = static::TABLE_NAME;
    }
    if($class_name === null) {
      $class_name = static::CLASS_NAME;
    }

    $sql = "SELECT * FROM " . $table_name . " WHERE " . $table_name . ".id = ?";
    return $this->selectOne($sql, [$id], $table_name, $class_name);
  }

  protected function selectOne($sql, $values, $table_name, $class_name) {
    $sth = $this->db->prepare($sql);
    $sth->setFetchMode(\PDO::FETCH_CLASS, $class_name);
    $sth->execute($values);
    $objects = $sth->fetchAll();

    if(!$objects) {
      return false;
    }

    $object = array_shift($objects);

    if(!isset($object::$has_many)) {
      return $object;
    }

    foreach($object::$has_many as $key => $tmp_class_name) {
      $singular   = $this->singularize($table_name);
      $tmp_table_name = $singular . '_' . $key;

      $sql = "SELECT * FROM " . $tmp_table_name . " WHERE " . $tmp_table_name . "." . $singular . "_id = ?";
      $sth = $this->db->prepare($sql);
      $sth->setFetchMode(\PDO::FETCH_CLASS, $tmp_class_name);
      $sth->execute([$object->id]);
      $objects = $sth->fetchAll();

      $object->{$key} = $objects;
    }

    return $object;
  }

  public function save(ToArrayInterface $obj, $table_name = null) {
    if($table_name === null) {
      $table_name = static::TABLE_NAME;
    }
    if($obj->id) {
      return $this->update($obj, $table_name);
    } else {
      return $this->create($obj, $table_name);
    }
  }

  private function update(ToArrayInterface $obj, $table_name) {
    $data = $this->sortData($obj->toArray());

    $sql  = "UPDATE " . $table_name . " SET ";
    $sql .= $this->keysToSql($data->scalars);
    $sql .= " WHERE " . $table_name . ".id = ?";

    $sth = $this->db->prepare($sql);
    $sth->execute(array_merge($this->assocToNumeric($data->scalars), [$obj->id]));
    $obj = $this->nestedObjects($obj, $data->nested);

    return $obj;
  }

  private function create(ToArrayInterface $obj, $table_name) {
    $data = $this->sortData($obj->toArray());

    $sql  = "INSERT INTO " . $table_name . " SET ";
    $sql .= $this->keysToSql($data->scalars);

    $sth = $this->db->prepare($sql);
    $sth->execute($this->assocToNumeric($data->scalars));
    $obj->id = $this->db->lastInsertId();

    $obj = $this->nestedObjects($obj, $data->nested);

    return $obj;
  }


  //
  //  Helpers
  //
  private function keysToSql(array $array) {
    $keys = [];
    foreach($array as $key => $value) {
      $keys[] = $key . " = ?";
    }

    return implode(", ", $keys);
  }

  private function sortData(array $data) {
    $temp = new \stdClass();
    $temp->scalars = [];
    $temp->nested  = [];
    foreach($data as $key => $value) {
      if(is_array($value)) {
        $temp->nested[$key] = $value;
      } else {
        $temp->scalars[$key] = $value;
      }
    }

    return $temp;
  }

  private function assocToNumeric(array $array) {
    $temp = [];
    foreach($array as $value) {
      $temp[] = $value;
    }
    return $temp;
  }

  private function nestedObjects(ToArrayInterface $obj, array $data) {
    foreach($data as $attr => $value) {
      if(is_array($value)) {
        $items = [];
        $id_method  = $this->singularize(static::TABLE_NAME) . '_id';
        $table_name = $this->singularize(static::TABLE_NAME) . '_' . $attr;
        foreach($value as $item) {
          $item->{$id_method} = $obj->id;
          $items[] = $this->save($item, $table_name);
        }

        $obj->{$attr} = $items;
      }
    }

    return $obj;
  }
}
