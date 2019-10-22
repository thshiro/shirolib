<?php
namespace thshiro\shirolib;

class Helpers {

  public function __construct(){

  }

  /*
  * @description checa campos obrigatórios em um post
  * @param
  *   $POST = ARRAY DO POST
  *   $FIELDS = ARRAY COM OS CAMPOS OBRIGATÓRIOS
  */
  public function required($POST, $CAMPOS, $CAMPOS_NOME = array(), $TAMANHO = false){


    ### percorre os campos do POST
    foreach($POST as $key => $value){

      ### renomeia nome do campo se existir
      $campo_nome = (isset($CAMPOS_NOME[$key]))? $CAMPOS_NOME[$key] : explode('_',$key)[0];

      ### verifica se está na lista
      if(in_array($key, $CAMPOS)){


        /* se está vazio */
        if(empty($value)){
          echo 'Desculpe, o campo <strong>'.mb_strtoupper($campo_nome).'</strong> é obrigatório.';
          exit;
          break;
        }

        /* se está no tamanho mínimo (se setado) */
        if($TAMANHO != false){

          if(strlen($value) < $TAMANHO){
            echo 'Desculpe, o campo <strong>'.mb_strtoupper($campo_nome).'</strong> precisa conter mais informação.';
            exit;
            break;
          }

        }


      } // se está na lista

    } // fim foreach post

  }

}

?>
