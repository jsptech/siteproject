<?php
    require_once('dbconfig.php');
    class ALBUM
    {
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        
        public function GetAllAlbum($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function CheckAlbumIfExists($album_title)
        {
            try
            {     
                $stmt = $this->conn->prepare($album_title);
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            } 
        }
        public function CheckAlbumIfExists1($title_name)
        {
            try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM album WHERE album_name=:album_name");
                $stmt->bindparam(":album_name", $album_name);
                $stmt->execute();
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                return $result;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            } 
        }
        public function GetAlbumById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM album WHERE id=:id");
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
       
        public function CreateAlbum($album_title, $thumb)
        {            
            try
            {         
                $stmt = $this->conn->prepare("INSERT INTO album(album_name, thumb) 
                                                        VALUES(:album_title, :thumb)");
                $stmt->bindparam(":album_title", $album_title);
                $stmt->bindparam(":thumb", $thumb, PDO::PARAM_LOB);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function UpdateAlbum($id, $album_title)
        {
            try
            {
                $stmt = $this->conn->prepare("UPDATE album SET album_name=:album_title WHERE id=:id");
                $stmt->bindparam(":id", $id);               
                $stmt->bindparam(":album_title", $album_title);                
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function DeleteAlbum($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM album WHERE id=:id");                
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
