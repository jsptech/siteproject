<?php
   require_once('dbconfig.php');
    class MESSAGE
    {
        private $post, $full_name, $address, $message_detail, $photo, $status;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function save_message($post, $full_name, $address, $message_detail, $photo, $status)
        {
            try{
                $stmt = $this->conn->prepare("INSERT INTO messages(post, full_name, address, message, photo, status) 
                                                                   VALUES(:post, :full_name, :address, :message_detail, :photo, :status)");
                $stmt->bindparam(":post", $post);
                $stmt->bindparam(":full_name", $full_name);
                $stmt->bindparam(":address", $address);
                $stmt->bindparam(":message_detail", $message_detail);
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

        public function GetAllMessage($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function DeleteMessage($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM messages WHERE id=:id");                
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetMessageById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM messages WHERE id=:id");
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

        public function UpdateMessage($id, $post, $full_name, $address, $message_detail, $photo, $status)
        {
        
            try
            {
                $stmt = $this->conn->prepare("UPDATE messages SET post=:post, full_name=:full_name, address=:address, message=:message_detail, photo=:photo, status=:status WHERE id=:id");
                $stmt->bindparam(":id", $id, PDO::PARAM_INT);               
                $stmt->bindparam(":post", $post);
                $stmt->bindparam(":full_name", $full_name);
                $stmt->bindparam(":address", $address);
                $stmt->bindparam(":message_detail", $message_detail);
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