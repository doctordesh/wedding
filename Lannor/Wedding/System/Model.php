<?php

namespace Lannor\Wedding\System;

class Model extends \Lannor\Base\Model
{
  public function __construct() {
    if(isset($__validate)) {
      $this->validate();
    }
  }
  protected function validate() {
    foreach($this->__validate as $type => $members) {
      foreach($members as $member) {
        if(isset($this->{$member})) {
          $this->{$member} = $this->validateByType($type, $this->{$member});
        }
      }
    }
  }

  protected function validateByType($type, $value) {
    $method = $type . 'val';
    return $method($value);
  }

  protected function attributes() {
    $attributes = [];
    foreach($this as $attribute => $value) {
      if(
        substr($attribute, 0, 2) !== '__'
        AND
        !$this->attributeIsRelation($attribute)
      ) {
        $attributes[] = $attribute;
      }
    }

    return $attributes;
  }

  protected function attributeIsRelation($attribute) {
    return (bool)(isset(static::$has_many) AND isset(static::$has_many[$attribute]));
  }

  public static function loadByValues($values) {
    $object = new static();

    foreach($object->attributes() as $valid_attribute) {
      if(isset($values[$valid_attribute])) {
        $object->$valid_attribute = $values[$valid_attribute];
      }
    }

    $object->validate();
    return $object;
  }
}