<?php

namespace Lannor\Base;

class Model implements ToArrayInterface
{
  public function __GET($key) {
    $camel_case_key = $this->snakeToCamel($key);
    if(method_exists($this, $camel_case_key)) {
      return $this->{$camel_case_key}();
    } else {
      return $this->get($key);
    }
  }

  public function __SET($key, $value) {
    $camel_case_key = $this->snakeToCamel('set_' . $key);
    if(method_exists($this, $camel_case_key)) {
      $this->{$camel_case_key}($value);
    } else {
      $this->set($key, $value);
    }
  }

  protected function get($key) {
    if(isset($this->attr_accessible) AND !in_array($key, $this->attr_accessible)) {
      throw new Exception("Value '" . $key . "' not accessible in " . get_class($this));
    }
    return $this->{$key};
  }

  protected function set($key, $value) {
    if(isset($this->attr_accessible) AND !in_array($key, $this->attr_accessible)) {
      throw new Exception("Value '" . $key . "' not accessible in " . get_class($this));
    }
    $this->{$key} = $value;
  }



  //
  //    ToArrayInterface
  //
  public function toArray() {
    $array = [];
    foreach($this as $attr => $value) {
      if(isset($this->{$attr}) AND substr($attr, 0, 2) !== '__') {
        $array[$attr] = $value;
      }
    }

    return $array;
  }



  //
  //  Helpers
  //
  private function snakeToCamel($val) {
    $val = str_replace(' ', '', ucwords(str_replace('_', ' ', $val)));
    $val = strtolower(substr($val,0,1)).substr($val,1);
    return $val;
  }
}