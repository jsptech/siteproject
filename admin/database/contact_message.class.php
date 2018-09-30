<?php
   require_once('dbconfig.php');
    class CONTACT_MESSAGE
    {
        private $full_name, $email, $contact_no, $subject, $message_detail;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function save_contact_message($full_name, $email, $contact_no, $subject, $message_detail)
        {
            try{
                $stmt = $this->conn->prepare("INSERT INTO contact_message(full_name, email, contact_no, subject, message) 
                                                                   VALUES(:full_name, :email, :contact_no, :subject, :message_detail)");
                $stmt->bindparam(":full_name", $full_name);
                $stmt->bindparam(":email", $email);
                $stmt->bindparam(":contact_no", $contact_no);
                $stmt->bindparam(":subject", $subject);
                $stmt->bindparam(":message_detail", $message_detail);
                
                $stmt->execute();
                return $stmt;
                //echo $this->name;
                
                
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
               
        }

        public function GetAllContact_Message($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }
        
        public function DeleteContact_Message($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM contact_message WHERE id=:id");                
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