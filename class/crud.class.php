<?php
namespace thshiro\shirolib;

class CRUD {


  /*
  * @description BASE DE INSERT PARA FORMULÁRIOS
  * CAMPOS NAME IGUAL AOS CAMPOS DA TABELA ALVO
  */
  public function insert($TABLE, $DATA, $DB = ''){


    $TABLE = (!empty($DB))? $DB.'.'.$TABLE : $TABLE;


    // montando campos
    $fields = '';
    foreach($DATA as $key => &$value){
      if(empty($fields)){
        $fields .= $key;
      }else{
        $fields .= ", ".$key;
      }
    }

    // montando values
    $values = '';
    foreach($DATA as $key => &$value){
      if(empty($values)){
        $values .= ":".$key;
      }else{
        $values .= ", :".$key;
      }
    }

    // Montando sql
    $SQL = $this->Conexao->prepare(
      "INSERT IGNORE INTO {$TABLE} ({$fields}) VALUES ({$values})"
    );

    // Setando binds
    $null = null;
    foreach($DATA as $key => &$value){
      $value = $value;
      if(empty($value)){
        $SQL->bindParam(':'.$key, $null, \PDO::PARAM_NULL);
      }else{
        $SQL->bindParam(':'.$key, $value);
      }
    }

    $SQL->execute();

  }




  /*
  * @description BASE DE INSERT PARA FORMULÁRIOS
  * CAMPOS NAME IGUAL AOS CAMPOS DA TABELA ALVO
  */
  public function update($TABLE, $DATA, $WHERE = '', $DB = ''){


    $TABLE = (!empty($DB))? $DB.'.'.$TABLE : $TABLE;


    // montando campos
    $fields = '';
    foreach($DATA as $key => &$value){
      if(empty($fields)){
        $fields .= $key." = :".$key;
      }else{
        $fields .= ", ".$key." = :".$key;
      }
    }

    // Montando sql
    $SQL = $this->Conexao->prepare(
      "UPDATE {$TABLE} SET {$fields} {$WHERE}"
    );

    // Setando binds
    $null = null;
    foreach($DATA as $key => &$value){
      $value = $value;
      if(empty($value)){
        $SQL->bindParam(':'.$key, $null, \PDO::PARAM_NULL);
      }else{
        $SQL->bindParam(':'.$key, $value);
      }
    }


    $SQL->execute();

  }




  /*
  * @description BASE DE DELETE
  *
  */
  public function delete($TABLE, $COLUMN, $ID, $DB = ''){


    $TABLE = (!empty($DB))? $DB.'.'.$TABLE : $TABLE;

    $SQL = $this->Conexao->prepare("DELETE FROM {$TABLE} WHERE {$COLUMN} = '{$ID}' ");
    $SQL->execute();

  }

}

?>
