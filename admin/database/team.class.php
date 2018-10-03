<?php
   require_once('dbconfig.php');
    class TEAM
    {
        private $name, $designation, $qualification, $mobile, $description, $facebook_link, $twitter_link, $google_link, $photo;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function save_team($name, $designation, $qualification, $mobile, $description, $facebook_link, $twitter_link, $google_link, $photo)
        {
            try{
                $stmt = $this->conn->prepare("INSERT INTO team(full_name, designation, qualification, mobile, description, facebook_link, twitter_link, google_link, photo) 
                                                        VALUES(:name, :designation, :qualification, :mobile, :description, :facebook_link, :twitter_link, :google_link, :photo)");                
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

        public function GetAllTeam($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function DeleteTeam($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM team WHERE id=:id");                
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetTeamById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM team WHERE id=:id");
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

        public function UpdateTeam($id, $name, $designation, $qualification, $mobile, $description, $facebook_link, $twitter_link, $google_link)
        {
            try
            {
                $stmt = $this->conn->prepare("UPDATE team SET full_name=:name, designation=:designation, qualification=:qualification, mobile=:mobile, description=:description, facebook_link=:facebook_link, twitter_link=:twitter_link, google_link=:google_link WHERE id=:id");
                $stmt->bindparam(":id", $id); 
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