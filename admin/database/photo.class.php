<?php
   require_once('dbconfig.php');
    class PHOTO
    {
        private $album_id, $photo_name, $description, $photo;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function save_photo($album_id, $photo_name, $description, $photo)
        {
            //$this->user_type = $user_type;
            //$this->name = $name;
            //echo $this->name;
            try{
                $stmt = $this->conn->prepare("INSERT INTO photo_store(album_id, photo_name, description, photo) 
                                                                   VALUES(:album_id, :photo_name, :description, :photo)");
                $stmt->bindparam(":album_id", $album_id);
                $stmt->bindparam(":photo_name", $photo_name);
                $stmt->bindparam(":description", $description);
                $stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
                
                
                $stmt->execute();
                return $stmt;
                //echo $this->name;
                
                
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
               
        }

        public function GetAllPhoto($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function DeletePhoto($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM photo_store WHERE id=:id");                
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetPhotoById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM photo_store WHERE id=:id");
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

        public function UpdatePhoto($id, $album_id, $photo_name, $description)
        {
        
            try
            {
                $stmt = $this->conn->prepare("UPDATE photo_store SET album_id=:album_id, photo_name=:photo_name, description=:description WHERE id=:id");
                $stmt->bindparam(":id", $id, PDO::PARAM_INT);               
                $stmt->bindparam(":album_id", $album_id);
                $stmt->bindparam(":photo_name", $photo_name);
                $stmt->bindparam(":description", $description);
                //$stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
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