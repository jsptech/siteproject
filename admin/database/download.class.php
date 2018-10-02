<?php
    require_once('dbconfig.php');
    class DOWNLOAD
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

        public function GetSlidById($id)
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

        public function CreateDownload($title, $detail, $file)
        {            
            try
            {         
                $stmt = $this->conn->prepare("INSERT INTO downloads(title, detail, file) 
                                                        VALUES(:title, :detail, :file)");
                $stmt->bindparam(":title", $title);
                $stmt->bindparam(":detail", $detail);
                $stmt->bindparam(":file", $file, PDO::PARAM_LOB);

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
                $stmt = $this->conn->prepare("UPDATE sliders SET SlidTitle=:SlidTitle, SlidSlog=:SlidSlog, SlidImage=:SlidImage WHERE id=:id");
                $stmt->bindparam(":id", $id);               
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
