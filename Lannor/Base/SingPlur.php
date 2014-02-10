<?php

namespace Lannor\Base;

trait SingPlur
{
  private static $plural_to_singular = array(
    'categories' => 'category',
    'properties' => 'property'
  );

  private static $singular_to_plural = array(
    'category' => 'categories',
    'property' => 'properties'
  );

  public static function singularize($word) {
    if(isset(self::$plural_to_singular[$word])) {
      return self::$plural_to_singular[$word];
    }

    return substr($word, 0, strlen($word) - 1);
  }

  public static function pluralize($word) {
    if(isset(self::$singular_to_plural[$word])) {
      return self::$singular_to_plural[$word];
    }

    return $word . 's';
  }
}