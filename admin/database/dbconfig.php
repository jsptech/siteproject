<?php
class Database
{   
    private $host = "localhost";
    private $db_name = "malika_db";
    private $username = "root";
    private $password = "";
    public $conn;
     
    public function dbConnection()
	{     
	    $this->conn = null;    
        try
		{
            $this->conn = new PDO("mysql:host=" . $this->host . ";dbname=" . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn-> exec("set names utf8");
        }
		catch(PDOException $e)
		{
            echo "Connection error: " . $e->getMessage();
        }         
        return $this->conn;
    }
}
?>