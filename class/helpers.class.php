<?php
namespace thshiro\shirolib;

class Helpers
{

    /**
    * Check required fields of an array
    * @param array $array is the array with the data
    * @param array $requiredFields is the required fields
    * @param array $requiredFieldsName is the required fields name to display
    * @param int $maxLength is the max length of a field
    */
    public function required($array, $requiredFields, $requiredFieldsName = array(), $maxLength = 0)
    {

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

}
