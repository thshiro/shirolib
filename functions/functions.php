<?php

/**
*   Convert every field to uppercase
*
*   @param array $array is the array with the fields to convert
*
*   @author Thalisson Barbosa
*/
function arrayToUpper($array) {

    array_walk_recursive($array, function (&$value, $key) {
        $value = mb_convert_case($value, MB_CASE_UPPER, 'UTF-8');
    });

  return $array;
}


/**
*   Check required fields of an array
*
*   @param array $array is the array with the data
*   @param array $requiredFields is the required fields
*   @param array $requiredFieldsName is the required fields name to display
*   @param int $maxLength is the max length of a field
*
*   @author Thalisson Barbosa
*/
function required($array, $requiredFields, $requiredFieldsName = array(), $maxLength = 0) {

    # walk array
    foreach ($array as $key => $value) {

      # rename the field name (if exists in option)
      $fieldName = (isset($requiredFieldsName[$key])) ? $requiredFieldsName[$key] : explode('_',$key)[0];

      # check if is in the list of required ($array)
      if (in_array($key, $requiredFields)) {

            if (empty($value)) {
                echo 'Desculpe, o campo <strong>' . mb_strtoupper($fieldName) . '</strong> é obrigatório.';
                exit;
                break;
            }

            if ($maxLength) {
                if(strlen($value) < $maxLength){
                    echo 'Desculpe, o campo <strong>' . mb_strtoupper($fieldName) . '</strong> precisa conter mais de ' . $maxLength . ' caracteres.';
                    exit;
                    break;
                }
            }


        } // end if in array

    }
}
