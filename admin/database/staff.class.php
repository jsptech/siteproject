<?php
   require_once('dbconfig.php');
    class STAFF
    {
        private $type, $name, $designation, $qualification, $mobile, $description, $facebook_link, $twitter_link, $google_link, $photo;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function save_staff($type, $name, $designation, $qualification, $mobile, $description, $facebook_link, $twitter_link, $google_link, $photo)
        {
            try{
                $stmt = $this->conn->prepare("INSERT INTO staffteachers(type, full_name, designation, qualification, mobile, description, facebook_link, twitter_link, google_link, photo) 
                                                        VALUES(:type, :name, :designation, :qualification, :mobile, :description, :facebook_link, :twitter_link, :google_link, :photo)");
                $stmt->bindparam(":type", $type);
                $stmt->bindparam(":name", $name);
                $stmt->bindparam(":designation", $designation);
                $stmt->bindparam(":qualification", $qualification);
                $stmt->bindparam(":mobile", $mobile);
                $stmt->bindparam(":description", $description);
                $stmt->bindparam(":facebook_link", $facebook_link);
                $stmt->bindparam(":twitter_link", $twitter_link);
                $stmt->bindparam(":google_link", $google_link);
                $stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
                
                $stmt->execute();
                return $stmt;
                //echo $this->name;
                
                
            }
            catch(PDOException $e)
            {
                echo "u".$e->getMessage();
            }
               
        }

        public function GetAllStaff($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function DeleteStaff($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM staffteachers WHERE id=:id");                
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetStaffById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM staffteachers WHERE id=:id");
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

        public function UpdateStaff($id, $type, $name, $designation, $qualification, $mobile, $description, $facebook_link, $twitter_link, $google_link)
        {
            try
            {
                $stmt = $this->conn->prepare("UPDATE staffteachers SET type=:type, full_name=:name, designation=:designation, qualification=:qualification, mobile=:mobile, description=:description, facebook_link=:facebook_link, twitter_link=:twitter_link, google_link=:google_link WHERE id=:id");
                $stmt->bindparam(":id", $id);               
                $stmt->bindparam(":type", $type);
                $stmt->bindparam(":name", $name);
                $stmt->bindparam(":designation", $designation);
                $stmt->bindparam(":qualification", $qualification);
                $stmt->bindparam(":mobile", $mobile);
                $stmt->bindparam(":description", $description);
                $stmt->bindparam(":facebook_link", $facebook_link);
                $stmt->bindparam(":twitter_link", $twitter_link);
                $stmt->bindparam(":google_link", $google_link);
                //$stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
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
?>