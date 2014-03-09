<?php

class Util
{
  private static $db;
  private static $config;

  public static function createController($name) {
    $controller = "\Lannor\Wedding\Controllers\\" . $name;
    return new $controller(self::db(), __DIR__ . '/Lannor/Wedding', self::config());
  }

  public static function db() {
    if(!isset(self::$db)) {
      $config = self::config();
      self::$db = new PDO(
        "mysql:host=" . $config->db->host . ";dbname=" . $config->db->name,
        $config->db->user,
        $config->db->pass
      );
      self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
      self::$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    }

    return self::$db;
  }

  public static function config() {
    if(!isset(self::$config)) {
      self::$config = json_decode(file_get_contents(__DIR__ . '/config.json'));
    }

    return self::$config;
  }

  public static function route($controller_name, $method) {
    $controller = self::createController($controller_name);
    if(method_exists($controller, 'before')) {
      $controller->before();
    }

    $template  = self::controllerNameToTemplatePath(str_replace('Controller', '', $controller_name));
    $name      = str_replace('/', '_', $template);
    $template .= '/' . $method;

    $controller->name = $name;
    $controller->method = $method;
    $controller->$method($_REQUEST);
    $controller->template = ($controller->template ?: $template);
    $controller->applicationTemplate();
  }


  public static function controllerNameToTemplatePath($input) {
    $parts = explode('\\', $input);
    foreach($parts as $key => $part) {
      preg_match_all('!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!', $part, $matches);
      $ret = $matches[0];
      foreach ($ret as &$match) {
        $match = $match == strtoupper($match) ? strtolower($match) : lcfirst($match);
      }
      $parts[$key] = implode('_', $ret);
    }

    return implode('/', $parts);
  }
}