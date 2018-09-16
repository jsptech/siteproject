 <?php
   require_once('dbconfig.php');
    class PAGE
    {
        //private $post, $full_name, $address, $message_detail, $photo, $status;
        private $conn;
        public function __construct()
        {
            $database = new Database();
            $db = $database->dbConnection();
            $this->conn = $db;
        }
        public function GetAllPages($sql)
                {
                    $stmt = $this->conn->prepare($sql);
                    return $stmt;
                }
    }
 
 
 
 
 
 
 
 
 