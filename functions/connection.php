<?php

class Datebase{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $datebase = "portfolio";

    public $conn; 

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->datebase);
        if($this->conn->connect_error){
            die("Connection Error:".$this->conn->connect_error);
        }else{
            return $this->conn;
        }
    }


}


?>