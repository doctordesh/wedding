<?php

namespace Lannor\Wedding\Helpers;

trait Linker
{
  public function active($path) {
    $path = rtrim($path, '/');
    return $_SERVER['REQUEST_URI'] == $path;
  }
}