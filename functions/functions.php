<?php

/**
* Convert every field to uppercase
* @param array $array is the array with the fields to convert
*/
function arrayToUpper($array){

    array_walk_recursive($array, function (&$value, $key) {
        $value = mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');
    });

  return $array;
}
