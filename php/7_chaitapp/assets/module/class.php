<?php
    class database{
        public $hostname = "localhost";
        public $user = "root";
        public $password = "";
        public $db_name = "chait_app";
        public $conn ;
        public $errors = [];
        function __construct(){
            $this->conn = new mysqli($this->hostname,$this->user,$this->password,$this->db_name);
        }
        public function query($sql){
            $res = $this->conn->query($sql);
            if(!$res){
                $this->$errors=$this->conn->connect_error;
            } 
            return $res;
        }
        public function rows($sql_result){
            $rows = [];
            if($sql_result->num_rows > 0){
                while($row = $sql_result->fetch_assoc()){
                    $rows[] = $row;
                }
            }
            return $rows;
        }
    }
    $db = new database();
?>