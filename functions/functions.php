<?php

/*
* @Description transforma todos os nomes de um array em maiusculo
*/
function array_to_upper($array){

  $array_new = [];

  foreach($array as $key => $value){

    $array_new[$key] = mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');

  }

  return $array_new;
}



?>
