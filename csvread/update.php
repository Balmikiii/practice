<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>update</title>
    <style>
        table{
            width: 80%;
            margin : auto;
            text-align:center;
        }
        table,td,th{
            border : 1px solid black;
            border-collapse : collapse;
        }
    </style>
</head>
<body>
    <?php
        if($_GET['id']) {
            $id = $_GET['id'];
            $datastored = [];
            $file = fopen("employees.csv", "rw"); 
            while (($data = fgetcsv($file,1000,",")) !==FALSE){ 
                $datastored[] = $data;
            } 
            fclose($file);
        }
        $name = $_GET['name'];
        $gender = $_GET['gender'];
        $start_date = $_GET['start_date'];
        $last_login = $_GET['last_login'];
        $salery = $_GET['salery'];
        $bonus = $_GET['bonus'];
        $managment = $_GET['managment'];
        $team = $_GET['team'];

        $add_list = array ($name, $gender, $start_date, $last_login, $salery, $bonus, $managment, $team);
        $datastored[$id] = $add_list;
        $file_append = fopen("employees.csv","w");
        foreach($datastored as $aaryline){
            fputcsv($file_append, $aaryline);
        }
        fclose($file_append);
        echo "<h2>Row updated</h2>";
        echo "<table>"; 
        for ($i=0; $i<1; $i++){
            echo "<tr><th>Sr No.</th>";
            for ($j=0; $j<count($datastored[$i]); $j++){
                echo "<th>".$datastored[$i][$j]."</th>";
            }
            echo "</tr>"; 
        }
        for ($i=$id; $i<($id+1); $i++){
            echo "<tr><td>$id</td>";
            for ($j=0; $j<count($datastored[$i]); $j++){
                echo "<td>".$datastored[$i][$j]."</td>";
            }
            echo "</tr>";  
        }
        echo "</table>"; 
        if ($id%10==0){
            header("location:index.php?page=".(floor($id/10)-1));
        }else{
            header("location:index.php?page=".floor($id/10));
        }
    ?>
</body>
</html>