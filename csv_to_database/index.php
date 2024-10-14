<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>csv_to_db</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form">
        <form action="index.php" method="get">
            <div class="input">
                <input type="search" id="search" onkeyup="showdatas(this.value)">
                <a href=index.php><button>Reset</button></a><br>
                <div>
                    <?php
                        if (!empty($_GET["pages"])){
                            echo "<p id='alerttt'>Page No. = ".$_GET['pages']."</p>";
                        }else{
                            echo "<p id='alerttt'>Page No. = 1</p>";
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>
    <?php
        if (!empty($_GET['pages'])){
            if($_GET['pages']<0){
                $pages = 0;
            }else{
                $pages = $_GET['pages']*10;
            }
        }else{
            $pages = 0;
        }
        session_start();
        $_SESSION["weburl"] = "http://localhost".$_SERVER['REQUEST_URI'];
        include "assets/module/conection_db.php";
        $sql = "SELECT * FROM csv_datas";
        $result = $conn->query($sql);
        if ($result->num_rows < 1){
            $datastored = [];
            $file = fopen("assets/file/employees.csv", "r"); 
            while (($data = fgetcsv($file,1000,",")) !==FALSE){ 
                $datastored[] = $data;
            } 
            fclose($file);
            for ($i=1; $i<count($datastored); $i++){
                $sql = "INSERT INTO csv_datas(name,gender,start_date,last_login,salery,bonus,management,team)
                VALUES('".$datastored[$i][0]."',
                    '".$datastored[$i][1]."',
                    '".date('Y-m-d',strtotime($datastored[$i][2]))."',
                    '".date("h:i a", strtotime($datastored[$i][3]))."',
                    '".(int)$datastored[$i][4]."',
                    '".(float)$datastored[$i][5]."',
                    '".$datastored[$i][6]."',
                    '".$datastored[$i][7]."');";

                $conn->query($sql);
            }
        }
        if (!empty($_GET['qr'])&&(!empty($_GET['pages']))){
            $display = "display:none";
        }else if(!empty($_GET['qr'])&&($_GET['pages']==0)){
            $display = "display:none";
        }
        else{
            $display = 'display:block';
        }
        $sql = "SELECT * FROM csv_datas limit $pages, 10";
        $result = $conn->query($sql);
        echo "<div class=first_data style=".$display."><table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Start_date</th>
                    <th>Last_login</th>
                    <th>Salery</th>
                    <th>Bonus</th>
                    <th>Management</th>
                    <th>Team</th>
                    <th colspan=2>Action</th>
                </tr>";
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>
                    <td>".$row["sr_no"]."</td>
                    <td>".$row["name"]."</td>
                    <td>".$row["gender"]."</td>
                    <td>".$row["start_date"]."</td>
                    <td>".$row["last_login"]."</td>
                    <td>".$row["salery"]."</td>
                    <td>".$row["bonus"]."</td>
                    <td>".$row["management"]."</td>
                    <td>".$row["team"]."</td>
                    <td><button value=".$row['sr_no']." class='editbtn' onclick=formshow(".$row['sr_no'].")>Edit</button></td>
                    <td><button value=".$row['sr_no']." class='delbtn' onclick=delete_func(".$row['sr_no'].")>Delete</button></td>
                </tr>";
            }
        }else{
            echo "0 results";
        }
        echo "</table>";
        $countrow = $conn->query("SELECT * FROM csv_datas");
        echo "<div class='pagination'>";
            echo "<a href=index.php?pages=".(($pages/10)-1)."><button><</button></a>";
                for ($i=0; $i<ceil(($countrow->num_rows)/10); $i++){
                    if((($i>0)&&($i<6))||($i>(floor(($countrow->num_rows)/10)-6))){
                        if($i==$pages/10){
                            echo "<a class='serch' href=index.php?pages=".($i)."><button class='btnlight'>".($i)."</button></a>";
                        }else{
                            echo "<a class='serch' href=index.php?pages=".($i)."><button>".($i)."</button></a>";
                        }
                    }else if(($i>7)&&($i<14)){
                        echo "<a class='serch' href=index.php?pages=".($i)."><button>.</button></a>";
                    }
                }
            if ((($pages/10)+1)<ceil(($countrow->num_rows)/10)){
                echo "<a href=index.php?pages=".(($pages/10)+1)."><button>></button></a>";
            }else{
                echo "<a href=index.php?pages=0><button>></button></a>";
            }
        echo "</div></div>";
    ?>
    <div class="update_form">
    </div>
    <div class="search">
    </div>
<!-- show data  -->
<?php
    if (!empty($_GET['qr'])){
        $qr = $_GET['qr'];
    
    echo "<div class='show_data_search'>";
        echo "<table>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Gender</th>
                    <th>Start_date</th>
                    <th>Last_login</th>
                    <th>Salery</th>
                    <th>Bonus</th>
                    <th>Management</th>
                    <th>Team</th>
                    <th colspan=2>Action</th>
                </tr>";
        $sql_like_limit = "SELECT * FROM csv_datas WHERE name LIKE '%".$qr."%' limit $pages, 10";
        $result_like_limit = $conn->query($sql_like_limit);
        if ($result_like_limit->num_rows > 0) {
            while($row = $result_like_limit->fetch_assoc()) {
                if ($qr !== "") {
                    $qr = strtolower($qr);
                    $len=strlen($qr);
                    $pattern = "/".$qr."/i";
                    if (preg_match($pattern, $row["name"])){
                        $rel = str_ireplace($qr,"<mark>".$qr."</mark>",$row["name"]);
                        echo "<tr>
                            <td>".$row["sr_no"]."</td>
                            <td>".$rel."</td>
                            <td>".$row["gender"]."</td>
                            <td>".$row["start_date"]."</td>
                            <td>".$row["last_login"]."</td>
                            <td>".$row["salery"]."</td>
                            <td>".$row["bonus"]."</td>
                            <td>".$row["management"]."</td>
                            <td>".$row["team"]."</td>
                            <td><button value=".$row['sr_no']." class='editbtn' onclick=formshow(".$row['sr_no'].")>Edit</button></td>
                            <td><button value=".$row['sr_no']." class='delbtn' onclick=delete_func(".$row['sr_no'].")>Delete</button></td>
                        </tr>";
                    }
                }
            }
        }else{
            echo "0 results";
        }
        echo "</table>";
        echo "<div class='paginationn'>";
        $result_like_limit = $conn->query("SELECT * FROM csv_datas WHERE name LIKE '%".$qr."%'");
        echo "<a href=index.php?pages=".(($pages/10)-1)."&qr=".$qr."><button><</button></a>";
            for ($i=0; $i<floor($result_like_limit->num_rows/10); $i++){
                if(($i<6)||($i>floor($result_like_limit->num_rows/10)-6)){
                    if($i!=0){
                        if($i==$pages/10){
                            echo "<a class='serch' href=index.php?pages=".($i)."&qr=".$qr."><button class='btnlight'>".($i)."</button></a>";
                        }else{
                            echo "<a class='serch' href=index.php?pages=".($i)."&qr=".$qr."><button>".($i)."</button></a>";
                        }
                    }
                }else if(($i>8)&&($i<14)){
                    echo "<a class='serch' href=index.php?pages=".($i)."&qr=".$qr."><button>.</button></a>";
                }
            }
            if ((($pages/10)+1)<ceil($result_like_limit->num_rows/10)){
                echo "<a href=index.php?pages=".(($pages/10)+1)."&qr=".$qr."><button>></button></a>";
            }else{
                echo "<a href=index.php?pages=0&qr=".$qr."><button>></button></a>";
            }
        echo "</div></div>";
    }
?>
    <!-- data show clone end  -->
    <script src="assets/js/index.js"></script>
</body>
</html>