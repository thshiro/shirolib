<?php

/**
*   Simple session control
*
*   @author Thalisson Barbosa
*/

namespace thshiro\shirolib;

class Session
{

  public function __construct()
  {
      # initiating check
      $this->check();
  }



    /**
    *   Check if session variables are set
    *
    *   @return null or redirect page
    */
    public function check()
    {

        $url = $_SERVER['PHP_SELF'];

        if (!isset($_SESSION['usuario_id']) && ($url == '/dashboard.php' || $url == '/index.php')) {

            header('Location: '.URL_ROOT.'/login.php');

        } elseif (isset($_SESSION['usuario_id']) && ($url == '/index.php' || $url == '/login.php')) {

            header('Location: '.URL_ROOT.'/dashboard.php');

        }

    }

}
