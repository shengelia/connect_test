<?php

class line implements ILine
{
public $db;
public function __construct()
    {
        $this->db = new db();
        $res = $this->db->getLineDb();
        $this->db->setLineDb($res, date("t"));

}  
}

?>