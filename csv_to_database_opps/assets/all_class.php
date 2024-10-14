<?php
    // connectioin databases
    class db_connection{
        public $db_host_name ="localhost" ;
        public $db_id = "root";
        public $db_pwd = "";
        public $db_name = "csv_oops";
        public $conn ;
        public function __construct(){
            $this->conn = new mysqli($this->db_host_name,$this->db_id,$this->db_pwd,$this->db_name);
        }
    }

    class table_operations extends db_connection {
        public $count ;
        public $all_select ;
        public $all_select_desc ;
        public function __construct(){
            $this->conn = new mysqli($this->db_host_name,$this->db_id,$this->db_pwd,$this->db_name);
            $this->count = $this->conn->query("SELECT * FROM csv_datas")->num_rows;
            $this->all_select = $this->conn->query("SELECT * FROM csv_datas");
            $this->all_select_desc = $this->conn->query("SELECT * FROM csv_datas ORDER BY sr_no DESC");
        }  
        public function all_print($pages){
            $limit = 0 ;
            $i = 0;
            if ($this->count > 0) {
                echo "<table><tr><th># ID</th><th>Name</th><th>Gender</th><th>Join Date</th><th>Last Login</th><th>Salery</th><th>Bonus</th><th>Management</th><th>Team</th><th colspan=2>Action</th></tr>";
                    while($row = $this->all_select->fetch_assoc()) {
                        $i += 1;
                        if (($pages*10)>$i){
                            continue;
                        }
                        if($limit<10){
                            echo "<tr>
                                <td>".$row["sr_no"]."</td>
                                <td>".$row["name"]."</td>
                                <td>".$row['gender']."</td>
                                <td>".$row['start_date']."</td>
                                <td>".$row['last_login']."</td>
                                <td>".$row['salery']."</td>
                                <td>".$row['bonus']."</td>
                                <td>".$row['management']."</td>
                                <td>".$row['team']."</td>
                                <td><button value=".$row['sr_no']." class='editbtn' onclick=formshow(".$row['sr_no'].",".$pages.")>Edit</button></td>
                                <td><button value=".$row['sr_no']." class='delbtn' onclick=delete_func(".$row['sr_no'].",".$pages.",'')>Delete</button></td>
                            </tr>";
                        }
                        $limit += 1;
                    }
                
                echo "</table>";
                echo "<div class='pagination'>";
                echo "<a href=index.php?pages=".($pages-1)."><button><</button></a>";
                for ($i=0; $i<ceil($this->count/10); $i++){
                    if(($i<6)||($i>ceil($this->count/10)-6)){
                        // if($i!=0){
                            // echo "<a href=index.php?pages=".($i)."><button>".($i)."</button></a>";
                            if($i==$pages){
                                echo "<a href=index.php?pages=".($i)."><button class=btnlight>".($i+1)."</button></a>";
                            }else{
                                echo "<a href=index.php?pages=".($i)."><button>".($i+1)."</button></a>";
                            }
                        // }
                    }else if(($i>8)&&($i<14)){
                        echo "<a href=index.php?pages=".($i)."><button>.</button></a>";
                    }
                }
                echo "<a href=index.php?pages=".($pages+1)."><button>></button></a>";
                echo "</div>";
            }
        }

        public function all_print_desc(){
            if ($this->count > 0) {
                echo "<table><tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Join Date</th>
                        <th>Last Login</th>
                        <th>Salery</th>
                        <th>Bonus</th>
                        <th>Management</th>
                        <th>Team</th>
                        <th colspan=2>Action</th>
                    </tr>";
                    while($row = $this->all_select_desc->fetch_assoc()) {
                        echo "<tr>
                            <td>".$row["sr_no"]."</td>
                            <td>".$row["name"]."</td>
                            <td>".$row['gender']."</td>
                            <td>".$row['start_date']."</td>
                            <td>".$row['last_login']."</td>
                            <td>".$row['salery']."</td>
                            <td>".$row['bonus']."</td>
                            <td>".$row['management']."</td>
                            <td>".$row['team']."</td>
                            <td><button value=".$row['sr_no']." class='editbtn' onclick=formshow(".$row['sr_no'].",".$pages.")>Edit</button></td>
                            <td><button value=".$row['sr_no']." class='delbtn' onclick=delete_func(".$row['sr_no'].",".$pages.")>Delete</button></td>
                        </tr>";
                    }
                echo "</table>";
                echo "<div class='pagination'>";
                for ($i=0; $i<ceil($this->count/10); $i++){
                    if(($i<6)||($i>ceil($this->count/10)-6)){
                        if($i!=0){
                            echo "<a href=index.php?pages=".($i)."><button>".($i)."</button></a>";
                        }
                    }else if(($i>8)&&($i<14)){
                        echo "<a href=index.php?pages=".($i)."><button>.</button></a>";
                    }
                }
                echo "</div>";
            }
        }

        function print_with_name($search,$pages){
            $sqll = "SELECT * FROM csv_datas WHERE name LIKE '%".$search."%'";
            $pagecount = $this->conn->query($sqll);
            if ($pages<0){
                $pages = floor($pagecount->num_rows/10);
            }else if($pages>floor($pagecount->num_rows/10)){
                $pages = 0;
            }
            $pages  = (int)$pages;
            $datashow = $pages*10;
            $limit = 0 ;
            if ($pages==0){
                $sql = "SELECT * FROM csv_datas WHERE name LIKE '%".$search."%' limit 1, 10";
            }else{
                $sql = "SELECT * FROM csv_datas WHERE name LIKE '%".$search."%' limit $datashow, 10";
            }
            $somedata = $this->conn->query($sql);
            if ($somedata->num_rows > 0) {
                echo "<table><tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Gender</th>
                        <th>Join Date</th>
                        <th>Last Login</th>
                        <th>Salery</th>
                        <th>Bonus</th>
                        <th>Management</th>
                        <th>Team</th>
                        <th colspan=2>Action</th>
                    </tr>";
                    while($row = $somedata->fetch_assoc()) {
                        $search = strtolower($search);
                        $len=strlen($search);
                        $pattern = "/".$search."/i";
                        if (preg_match($pattern, $row["name"])){
                            $rel = str_ireplace($search,"<mark>".$search."</mark>",$row["name"]);
                            if($limit<10){
                                echo "<tr>
                                    <td>".$row['sr_no']."</td>
                                    <td>".$rel."</td>
                                    <td>".$row['gender']."</td>
                                    <td>".$row['start_date']."</td>
                                    <td>".$row['last_login']."</td>
                                    <td>".$row['salery']."</td>
                                    <td>".$row['bonus']."</td>
                                    <td>".$row['management']."</td>
                                    <td>".$row['team']."</td>
                                    <td><button value=".$row['sr_no']." class='editbtn' onclick=formshow(".$row['sr_no'].",".$pages.")>Edit</button></td>
                                    <td><button value=".$row['sr_no']." class='delbtn' onclick=delete_func(".$row['sr_no'].",".$pages.",'".$search."')>Delete</button></td>
                                </tr>";
                            }
                        }
                        $limit += 1;
                    }
                echo "</table>";
                echo "<div class='pagination'>";
                
                // if (($pages<0)||($pages>floor($pagecount->num_rows/10))){
                //     $pages = 0;
                // }
                echo "<button type=button onclick=showdatass('".$search."',".($pages-1).")><</button>";
                    for ($i=0; $i<ceil($pagecount->num_rows/10); $i++){
                        if(($i<6)||($i>ceil($pagecount->num_rows/10)-6)){
                            // if($i!=0){
                                // echo "<button type=button onclick=showdatas('".$search."',".$i.")>".$i."</button>";
                                if(($i)==$pages){
                                    echo "<button class=btnlight type=button onclick=showdatass('".$search."',".$i.")>".($i+1)."</button>";
                                }else{
                                    echo "<button type=button onclick=showdatass('".$search."',".$i.")>".($i+1)."</button>";
                                }
                            // }
                        }else if(($i>8)&&($i<14)){
                            echo "<a href=index.php?pages=".($i)."&search=".$search."><button>.</button></a>";
                        }
                    }
                    echo "<button type=button onclick=showdatass('".$search."',".($pages+1).")>></button>";
                echo "</div>";
            }
            
        }

        function delete(...$x) {
            $n = [];
            for($i = 0; $i <count($x); $i++){
                $n[] = $x[$i];
            }
            if (count($n)==1){
                $this->conn->query("DELETE FROM csv_datas WHERE sr_no = ".$n[0]);
            }else if(count($n)==2){
                $this->conn->query("DELETE FROM csv_datas WHERE sr_no BETWEEN ".$n[0]." and ".$n[1]);
            }
        }

        function update($pages,$sr_no,$name,$gender,$start_date,$last_login,$salery,$bonus,$management,$team){
            $sql = "UPDATE csv_datas SET name='".$name."',
             gender='".$gender."',
             start_date='".date("Y-m-d", strtotime($start_date))."',
             last_login='".date("h:i a", strtotime($last_login))."',
             salery='".$salery."',
             bonus='".$bonus."',
             management='".$management."',
             team='".$team."' WHERE sr_no=".$sr_no;
            $this->conn->query($sql);
        }

        function insert($name,$gender,$start_date,$last_login,$salery,$bonus,$management,$team){
            $sql = "INSERT INTO csv_datas(name,gender,start_date,last_login,salery,bonus,management,team)VALUES('".$name."','".$gender."','".date("Y-m-d", strtotime($start_date))."','".date("h:i a", strtotime($last_login))."','".$salery."','".$bonus."','".$management."','".$team."')";
            $this->conn->query($sql);
        }    
    }
?>
