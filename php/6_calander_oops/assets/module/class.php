<?php
    class database{
        public $hostname = "localhost";
        public $user = "root";
        public $password = "";
        public $db_name = "calendar";
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
    class calander{
        public $month;
        public $month_name;
        public $year;
        public $days;
        public $today;
        public $start_week;
        public $start_week_full_name;
        public $skeep_day;
        public $datearry;
        function __construct($month = null,$year=null){
            $this->month = date("m");
            if ($month!=null){
                $this->month = $month;  
            }
            $this->year = date("Y");
            if ($year!=null){
                $this->year = $year;
            }
            $this->month_name = date("F", mktime(0, 0, 0,$this->month,1,$this->year));
            $this->days = cal_days_in_month(CAL_GREGORIAN,$this->month,$this->year);
            $this->today = date('j');
            $this->start_week = date("l", mktime(0, 0, 0,$this->month,1,$this->year));
            $this->start_week_full_name = date("D", mktime(0, 0, 0,$this->month,1,$this->year));
            $this->skeep_day = date("w", mktime(0, 0, 0,$this->month,1,$this->year));
            $this->datearry = getdate();
        }
    }
    $db = new database();
    $cal = new calander();
?>