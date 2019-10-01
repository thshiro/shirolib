<?php
namespace Lib\Shirolib;

class Session {

  public function __construct(){

    $this->check();

  }

  public function check(){

    $url = $_SERVER['PHP_SELF'];

    if(!isset($_SESSION['usuario_id']) && $url == '/dashboard.php'){

      header('Location: '.URL_ROOT.'/login.php');

    }elseif(isset($_SESSION['usuario_id']) && $url == '/dashboard.php'){

      header('Location: '.URL_ROOT.'/dashboard.php');

    }
  }

}

?>
