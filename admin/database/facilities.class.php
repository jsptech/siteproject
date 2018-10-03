<?php
    require_once('dbconfig.php');
    class FACILITY
    {
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        
        public function GetAllFacility($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function GetFacilityById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM facilities WHERE id=:id");
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

        public function CreateFacility($title, $detail, $photo)
        {            
            try
            {         
                $stmt = $this->conn->prepare("INSERT INTO facilities(title, details, photo) 
                                                        VALUES(:title, :detail, :photo)");
                $stmt->bindparam(":title", $title);
                $stmt->bindparam(":detail", $detail);
                $stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);

                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function UpdateFacility($id, $title, $detail)
        {
            try
            {
                $stmt = $this->conn->prepare("UPDATE facilities SET title=:title, details=:detail WHERE id=:id");
                $stmt->bindparam(":id", $id);               
                $stmt->bindparam(":title", $title);
                $stmt->bindparam(":detail", $detail);
               // $stmt->bindparam(":SlidImage", $SlidImage, PDO::PARAM_LOB);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function DeleteFacility($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM facilities WHERE id=:id");                
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
