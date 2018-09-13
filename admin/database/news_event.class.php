<?php
   require_once('dbconfig.php');
    class NEWS_EVENT
    {
        private $type, $news_title, $news_content, $photo, $posted_by, $posted_date, $status;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function save_news($type, $news_title, $news_content, $photo, $posted_by, $posted_date, $status)
        {
            //$this->user_type = $user_type;
            //$this->name = $name;
            //echo $this->name;
            try{
                $stmt = $this->conn->prepare("INSERT INTO news_events(news_event, news_title, news_content, image_file, posted_by, posted_date, statuss) 
                                                        VALUES(:type, :news_title, :news_content, :photo, :posted_by, :posted_date, :status)");
                $stmt->bindparam(":type", $type);
                $stmt->bindparam(":news_title", $news_title);
                $stmt->bindparam(":news_content", $news_content);
                $stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
                $stmt->bindparam(":posted_by", $posted_by);
                $stmt->bindparam(":posted_date", $posted_date);
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

        public function GetAllNews_Event($sql)
        {
            $stmt = $this->conn->prepare($sql);
            return $stmt;
        }

        public function DeleteNews_Event($id)
        {
            try
            {
                $stmt = $this->conn->prepare("DELETE FROM news_events WHERE id=:id");                
                $stmt->bindparam(":id", $id);
                $stmt->execute();
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }

        public function GetNewsById($id)
        {   try
            {     
                $stmt = $this->conn->prepare("SELECT * FROM news_events WHERE id=:id");
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

        public function UpdateNews($id, $type, $news_title, $news_content, $image, $posted_by, $date, $status)
        {
            try
            {
                $stmt = $this->conn->prepare("UPDATE news_events SET news_event=:type, news_title=:news_title, news_content=:news_content, image_file=:image, posted_by=:posted_by, posted_date=:date, statuss=:status  WHERE id=:id");
                $stmt->bindparam(":id", $id);               
                $stmt->bindparam(":news_event", $type);
                $stmt->bindparam(":news_title", $news_title);
                $stmt->bindparam(":news_content", $news_content);
                $stmt->bindparam(":image_file", $image, PDO::PARAM_LOB);
                $stmt->bindparam(":posted_by", $posted_by);
                $stmt->bindparam(":posted_date", $date);
                $stmt->bindparam(":statuss", $status);
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