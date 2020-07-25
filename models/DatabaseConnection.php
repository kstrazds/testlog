<?php
namespace models;

class DatabaseConnection 
{

    private $servername;
    private $username;
    private $password;
    private $dbname;

    public function connect() 
    {
        $this->servername = "localhost";
        $this->username = "root";
        $this->password = "";
        $this->dbname = "loginregister";

        $conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        $conn->set_charset("utf8");
        return $conn;
    }
}