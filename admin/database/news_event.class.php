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
                echo $e->getMessage();
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

        public function UpdateNews($id, $type, $news_title, $news_content, $posted_by, $posted_date, $status)
        {
        
            try
            {
                $stmt = $this->conn->prepare("UPDATE news_events SET news_event=:news_event, news_title=:news_title, news_content=:news_content, posted_by=:posted_by, posted_date=:posted_date, statuss=:statuss WHERE id=:id");
                $stmt->bindparam(":id", $id, PDO::PARAM_INT);               
                $stmt->bindparam(":news_event", $type);
                $stmt->bindparam(":news_title", $news_title);
                $stmt->bindparam(":news_content", $news_content);
                //$stmt->bindparam(":photo", $photo, PDO::PARAM_LOB);
                $stmt->bindparam(":posted_by", $posted_by);
                $stmt->bindparam(":posted_date", $posted_date);
                $stmt->bindparam(":statuss", $status);
                $stmt->execute();                
                return $stmt;
            }
            catch(PDOException $e)
            {
                echo $e->getMessage();
            }
        }
    }

    $month_array = array("01"=>"बैशाख",
                      "02"=>"जेष्ठ",
                      "03"=>"असार",
                      "04"=>"श्रावण",
                      "05"=>"भाद्र",
                      "06"=>"असोज",
                      "07"=>"कात्तिक",
                      "08"=>"मंसिर",
                      "09"=>"पौष",
                      "10"=>"माघ",
                      "11"=>"फाल्गुण",
                      "12"=>"चैत्र",
);

$day_array = array("01"=>"१",
                    "02"=>"२",
                    "03"=>"३",
                    "04"=>"४",
                    "05"=>"५",
                    "06"=>"६",
                    "07"=>"७",
                    "08"=>"८",
                    "09"=>"९",
                    "10"=>"१०",
                    "11"=>"११",
                    "12"=>"१२",
                    "13"=>"१३",
                    "14"=>"१४",
                    "15"=>"१५",
                    "16"=>"१६",
                    "17"=>"१७",
                    "18"=>"१८",
                    "19"=>"१८",
                    "20"=>"२०",
                    "21"=>"२१",
                    "22"=>"२२",
                    "23"=>"२३",
                    "24"=>"२४",
                    "25"=>"२५",
                    "26"=>"२६",
                    "27"=>"२७",
                    "28"=>"२८",
                    "29"=>"३९",
                    "30"=>"३०",
                    "31"=>"३१",
                    "32"=>"३२");
$year_array = array("2075"=>"२०७५",
                    "2076"=>"२०७६",
                    "2077"=>"२०७७",
                    "2078"=>"२०७८",
                    "2079"=>"२०७९",
                    "2080"=>"२०८०",
                    "2081"=>"२०८१",
                    "2082"=>"२०८२",
                    "2083"=>"२०८३",
                    "2084"=>"२०८४",
                    "2085"=>"२०८५",
                    "2086"=>"२०८६",
                    "2087"=>"२०८७",
                    "2088"=>"२०८८",)
?>