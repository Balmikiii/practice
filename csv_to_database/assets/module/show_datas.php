<?php
$q = $_REQUEST["q"];
include "conection_db.php";
$sql = "SELECT * FROM csv_datas";
$result = $conn->query($sql);

echo "<div class=data_show_table><table>
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
        
$limit = 0 ;
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        if ($q !== "") {
            $q = strtolower($q);
            $len=strlen($q);
            $pattern = "/".$q."/i";
            if (preg_match($pattern, $row["name"])){
                $rel = str_ireplace($q,"<mark>".$q."</mark>",$row["name"]);
                if($limit<10){
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
                $limit += 1;
            }
        }
    }
}else{
    echo "0 results";
}
echo "</table>"; 
echo "<div class='pagination'>";
    for ($i=0; $i<floor($limit/10); $i++){
        if(($i<6)||($i>floor($limit/10)-6)){
            if($i!=0){
                echo "<a class='serch' href=index.php?pages=".($i)."&qr=".$q."><button>".($i)."</button></a>";
            }
        }else if(($i>8)&&($i<14)){
            echo "<a class='serch' href=index.php?pages=".($i)."&qr=".$q."><button>.</button></a>";
        }
    }
echo "</div></div>";

?>