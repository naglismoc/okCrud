<?php

class Db {
    public $conn;

    public function __construct(){
        $servername = "localhost";
        $username = "root";
        $password = "";
        $db = "vyrukai_firstdb";
        $this->conn = new mysqli($servername,$username,$password,$db);
    }

}




?>