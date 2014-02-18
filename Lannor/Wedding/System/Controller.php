<?php

namespace Lannor\Wedding\System;

class Controller
{
  protected $db;
  protected $base_path;
  protected $config;

  public $layout   = 'application';
  public $template = null;

  public function __construct(\PDO $db, $base_path, $config) {
    $this->db        = $db;
    $this->base_path = $base_path;
    $this->config    = $config;

    if(method_exists($this, 'initialize')) {
      $this->initialize();
    }
  }

  public function redirect($where) {
    header('Location: ' . $where);
    exit;
  }

  public function applicationTemplate() {
    require_once($this->base_path . '/Views/layouts/' . $this->layout . '.html.php');
  }

  private function page() {
    if($this->template) {
      return $this->renderPartial($this->template);
    }
  }

  private function renderPartial($name, $vars = []) {
    ob_start();
    ob_clean();
    extract($vars);
    require($this->base_path . '/Views/' . $name . '.html.php');

    $html = ob_get_contents();

    ob_end_clean();
    return $html;
  }

  public function notice($message) {
    $_SESSION['notice'] = $message;
  }

  public function getNotice() {
    if(isset($_SESSION['notice'])) {
      $notice = $_SESSION['notice'];
      unset($_SESSION['notice']);
      return $notice;
    } else {
      return false;
    }
  }
}
