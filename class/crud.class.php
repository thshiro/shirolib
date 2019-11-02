<?php
namespace thshiro\shirolib;

/**
* Bases for SQL PDO Insert, Update and Delete
*
* @param PDO $this->connection is the pdo connection
*/
class Crud
{

  /**
  * Insert PDO base
  *
  * @param string $table the target for insert
  * @param array $data the data for insert
  * @param string $database the database for insert (optional)
  */
  public function insertData($table, $data, $database = false)
  {

    $table = !empty($database) ? $database.'.'.$table : $table;

    # Setting fields
    $fields = '';
    foreach ($data as $key => &$value) {
      if (empty($fields)) {
        $fields .= $key;
      } else {
        $fields .= ", ".$key;
      }
    }

    # Setting values
    $values = '';
    foreach ($data as $key => &$value) {
      if (empty($values)) {
        $values .= ":".$key;
      } else {
        $values .= ", :".$key;
      }
    }

    # Setting insert SQL
    $SQL = $this->connection->prepare(
      "INSERT IGNORE INTO {$table} ({$fields}) VALUES ({$values})"
    );

    ## Setting binds
    $null = null;
    foreach ($data as $key => &$value) {
      $value = $value;
      if (empty($value)) {
        $SQL->bindParam(':'.$key, $null, \PDO::PARAM_NULL);
      } else {
        $SQL->bindParam(':'.$key, $value);
      }
    }

    try {
        $SQL->execute();
    } catch (Exception $e) {
        echo "Sorry, something went wrong. :(";
    }



  }



  /**
  * Update PDO base
  *
  * @param string $table is the table target for update
  * @param array $data is the data for update
  * @param string $where is the where clause for the update (optional)
  * @param string $database the database for insert (optional)
  */
  public function updateData($table, $data, $where = '', $database = '')
  {

    $table = !empty($database) ? $database.'.'.$table : $table;

    # Setting fields
    $fields = '';
    foreach ($data as $key => &$value) {
      if (empty($fields)) {
        $fields .= $key." = :".$key;
      } else {
        $fields .= ", ".$key." = :".$key;
      }
    }

    # Setting update SQL
    $SQL = $this->connection->prepare(
      "UPDATE {$table} SET {$fields} {$where}"
    );

    # Setting binds
    $null = null;
    foreach ($data as $key => &$value) {
      $value = $value;
      if (empty($value)) {
        $SQL->bindParam(':'.$key, $null, \PDO::PARAM_NULL);
      } else {
        $SQL->bindParam(':'.$key, $value);
      }
    }

    try {
        $SQL->execute();
    } catch (Exception $e) {
        echo "Sorry, something went wrong. :(";
    }

  }



  /**
  * Delete PDO base
  *
  * @param string $table is the table target for delete
  * @param string $where is the where clause for delete
  * @param string $database the database for delete (optional)
  */
  public function deleteData($table, $where, $database = '')
  {

    $table = !empty($database) ? $database.'.'.$table : $table;

    $SQL = $this->connection->prepare("DELETE FROM {$table} WHERE {$where}");

    try {
        $SQL->execute();
    } catch (Exception $e) {
        echo "Sorry, something went wrong. :(";
    }

  }

}

?>
