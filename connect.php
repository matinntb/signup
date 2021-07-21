<?php

    class DbConnect {

        private $conn;

        public function __construct() {

            include_once('config.php');  
            
            $this->conn = mysqli_connect($DB_HOST, $DB_USER, $DB_PASSWORD);

            mysqli_select_db($this -> conn,$DB_DATABSE);  

            if(!$this -> conn)// testing the connection  
            {  
                die ("Cannot connect to the database");  
            }

            mysqli_set_charset($this->conn, "utf8");
        }

        public function getConnectionObj(){

            return $this -> conn;
        }  
    }

?>  