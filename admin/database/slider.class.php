<?php
    require_once('database/dbconfig.php');
    class SLID
    {
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        
        public function GetAllSlid($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function GetById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM sliders WHERE id=:id");
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            } 
        }

        public function CreateSlid($SlidTitle, $SlidSlog, $SlidImage)
        {            
            try
            {         
                $stmt = $this->conn->prepare("INSERT INTO Sliders(SlidTitle, SlidSlog, SlidImage) 
                                                        VALUES(:SlidTitle, :SlidSlog, :SlidImage)");
                $stmt->bindparam(":SlidTitle", $SlidTitle);
                $stmt->bindparam(":SlidSlog", $SlidSlog);
                $stmt->bindparam(":SlidImage", $SlidImage, PDO::PARAM_LOB);

                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function UpdateSlid($id, $SlidTitle, $SlidSlog, $SlidImage)
        {
            try
            {
                $stmt = $this->conn->prepare("UPDATE sliders SET SlidTitle=:SlidTitle, SlidSlog=:SlidSlog, SlidImage=:SlidImage WHERE Id=:Id");
                
                $stmt->bindparam(":Id", $Id);
                $stmt->bindparam(":SlidTitle", $SlidTitle);
                $stmt->bindparam(":SlidSlog", $SlidSlog);
                $stmt->bindparam(":SlidImage", $SlidImage, PDO::PARAM_LOB);

                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function DeleteSlid($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM sliders WHERE id=:id");                
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

    }
?>
