<?php

include_once 'config/Database.php';

class GenericDAO
{
    protected $conn;

    function __construct()
    {
        $db = new Database();
        $this->conn = $db->getConnection();
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function setConn($conn): self
    {
        $this->conn = $conn;
        return $this;
    }
}
