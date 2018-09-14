<?php
   require_once('dbconfig.php');
    class CONTENT
    {
        private $page_id, $tile, $description, $photo, $status;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function save_content($page_id, $tile, $description, $photo, $status)
        {
            //$this->user_type = $user_type;
            //$this->name = $name;
            //echo $this->name;
            try{
                $stmt = $this->conn->prepare("INSERT INTO contents(PageId, title, Description, photo, status) 
                                                                   VALUES(:page_id, :tile, :description, :photo, :status)");
                $stmt->bindparam(":page_id", $page_id);
                $stmt->bindparam(":tile", $tile);
                $stmt->bindparam(":description", $description);
                $stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
                $stmt->bindparam(":status", $status);
                
                $stmt->execute();
                return $stmt;
                //echo $this->name;
                
                
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
               
        }

        public function GetAllContent($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function DeleteContent($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM contents WHERE id=:id");                
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetContentById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM contents WHERE id=:id");
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

        public function UpdateContent($id, $page_id, $tile, $description, $photo, $status)
        {
        
            try
            {
                $stmt = $this->conn->prepare("UPDATE contents SET PageId=:page_id, title=:tile, Description=:description, photo=:photo, status=:status WHERE id=:id");
                $stmt->bindparam(":id", $id, PDO::PARAM_INT);               
                $stmt->bindparam(":page_id", $page_id);
                $stmt->bindparam(":tile", $tile);
                $stmt->bindparam(":description", $description);
                $stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
                $stmt->bindparam(":status", $status);
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