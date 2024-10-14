<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
    <link rel="stylesheet" href="style.css">
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
    $list_arry = [];
    for ($i=$id; $i<($id+1); $i++){
        for ($j=0; $j<count($datastored[$i]); $j++){
            $datastored[$i][$j];
            $list_arry[]=$datastored[$i][$j];
        }
    }
        $newformat = date('Y-m-d',strtotime($list_arry[2]));
        $timech = date("H:i", strtotime($list_arry[3]));
    ?>
    <div class="update_form">
        <form action="update.php" method="get">
            <button class="form_btn_close" type="button" onclick="form_btn_close();">X</button>
            <input type="hidden" name="id" value=<?php echo $_GET['id'];?>><br>
            <label for="name">Name : </label>
            <span><input type="text" name="name" value="<?php echo $list_arry[0];?>"><br></span>
            <label for="gender">Gender : </label>
            <span><input type="radio" name="gender" <?php echo $list_arry[1]=="Male"? "checked" : "";?> value="Male">Male
            <input type="radio" name="gender" <?php echo $list_arry[1]=="Female"? "checked" : "";?> value="Female">Female <br></span>
            <label for="start_date">start_date : </label>
            <span><input type="date" name="start_date" value="<?php echo $newformat;?>"><br></span>
            <label for="time">last_login : </label>
            <span><input type="time" name="last_login" value="<?php echo $timech;?>"><br></span>
            <label for="salery">salery : </label>
            <span><input type="text" name="salery" value="<?php echo $list_arry[4];?>"><br></span>
            <label for="bonus">bonus : </label>
            <span><input type="text" name="bonus" value="<?php echo $list_arry[5];?>"><br></span>
            <label for="managment">managment : </label>
            <span><input type="text" name="managment" value="<?php echo $list_arry[6];?>"><br></span>
            <label for="team">team : </label>
            <span><input type="text" name="team" value="<?php echo $list_arry[7];?>"><br></span>
            <input type="submit" value="submit">
        </form>
    </div>
</body>
</html>