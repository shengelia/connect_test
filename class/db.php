<?php

final class db extends abstractDb{

 protected  $_db;
 private $_dbName = 'line.db';
public function __construct(){
    if(is_file($this->_dbName)){
        $this->_db = new PDO('sqlite:' . $this->_dbName);
        }else{
            $this->_db = new PDO('sqlite:' . $this->_dbName);
            $sql = "CREATE TABLE inLine(
									id INTEGER PRIMARY KEY AUTOINCREMENT,
									name TEXT,
									balance INTEGER,
                                    mothylycost INTEGER,
									datetime INTEGER
								)";
            $this->_db->exec($sql);
}
}
public function getLineDb(){
        $sql = "SELECT *
					FROM inLine";
      $result = $this->_db->query($sql);  
      return $result->fetchAll();
}
public function setLineDb($res, $dayMonth){
foreach($res as $lineRow){
    $balance = (int)($lineRow['balance'] - ($lineRow['mothylycost'] / $dayMonth));
    $sql = "UPDATE inLine
    SET balance = {$balance}
    WHERE id = {$lineRow['id']} ";
    $this->_db->query($sql) or die(var_dump($this->db->errorInfo()));
}
}
}

