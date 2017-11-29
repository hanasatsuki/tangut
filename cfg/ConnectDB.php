<?php

class ConnectDB{
    public $host = 'localhost';
    public $username = 'root';
    public $password = '305neowNEOW';
    public $database = 'tangut';

    function __construct(){
        $this->sql_connect();
    }

    function sql_connect(){
        $conn = mysqli_connect($this->host,$this->username,$this->password,$this->database);
        return $conn;
    }
}

$connectDB=new ConnectDB;
?>