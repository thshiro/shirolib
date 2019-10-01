<?php
namespace Lib\Shirolib;

class Helpers {

  public function __construct(){

  }

  /*
  * @description checa campos obrigatórios em um post
  * @param
  *   $POST = ARRAY DO POST
  *   $FIELDS = ARRAY COM OS CAMPOS OBRIGATÓRIOS
  */
  public function required($POST, $FIELDS){


    foreach($POST as $key => $value){

      if(in_array($key, $FIELDS) && empty($value)){

          echo 'Desculpe, o campo <strong>'.mb_strtoupper(explode('_',$key)[0]).'</strong> é obrigatório.';
          exit;
          break;
      }
    }

  }

}

?>
