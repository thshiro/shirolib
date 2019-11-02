<?php

/**
* Convert every field to uppercase
* @param array $array is the array with the fields to convert
*/
function arrayToUpper($array){

  $newArray = [];

  foreach ($newArray as $key => $value) {
    $newArray[$key] = mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');
  }

  return $newArray;
}
