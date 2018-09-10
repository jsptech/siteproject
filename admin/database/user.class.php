<?php
   require_once('dbconfig.php');
    class USER
    {
        private $user_type, $name, $email_id, $username, $password, $photo, $status;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function save_user($user_type, $name, $email_id, $username, $password, $photo, $status)
        {
            $this->user_type = $user_type;
            $this->name = $name;
            echo $this->name;
            try{
                $stmt = $this->conn->prepare("INSERT INTO user(Full_Name, Email_id, username, password, user_type, photo, status) 
                                                        VALUES(:Full_Name, :Email_id, :username, :password, :user_type, :photo, :status)");
                $stmt->bindparam(":Full_Name", $name);
                $stmt->bindparam(":Email_id", $email_id);
                $stmt->bindparam(":username", $username);
                $stmt->bindparam(":password", $password);
                $stmt->bindparam(":user_type", $user_type);
                $stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
                $stmt->bindparam(":status", $status);
                
                $stmt->execute();
                return $stmt;
                //echo $this->name;
                
                
            }
            catch(PDOException $e)
            {
                echo "u".$e->getMessage();
            }
               
        }

        public function GetAllUser($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function DeleteUser($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM user WHERE id=:id");                
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetUserById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM user WHERE id=:id");
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

        public function UpdateUser($id, $user_type, $name, $email_id, $username, $password, $photo, $status)
        {
            try
            {
                $stmt = $this->conn->prepare("UPDATE user SET Full_Name=:Full_Name, Email_id=:Email_id, username=:username, password=:password, user_type=:user_type, photo=:photo, status=:status  WHERE id=:id");
                $stmt->bindparam(":id", $id);               
                $stmt->bindparam(":Full_Name", $name);
                $stmt->bindparam(":Email_id", $email_id);
                $stmt->bindparam(":username", $username);
                $stmt->bindparam(":password", $password);
                $stmt->bindparam(":user_type", $user_type);
                $stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
                $stmt->bindparam(":status", $status);
                $stmt->execute();
                echo 1;
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }
     
   