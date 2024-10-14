<?php 
    $data = [];
    include "conection_db.php";
    $id = $_GET['id'];
    $sql = "SELECT * FROM csv_datas where sr_no=$id";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $data[] = $row["sr_no"];
            $data[] = $row["name"];
            $data[] = $row["gender"];
            $data[] = $row["start_date"];
            $data[] = $row["last_login"];
            $data[] = $row["salery"];
            $data[] = $row["bonus"];
            $data[] = $row["management"];
            $data[] = $row["team"];
        }
    }
?>
<form action="assets/module/update.php" method="get">
    <button class="form_btn_close" type="button" onclick="form_btn_close();">X</button>
    <input type="hidden" name="id" value=<?php echo $data[0];?>><br>
    <label for="name">Name : </label>
    <span><input type="text" name="name" value="<?php echo $data[1];?>"><br></span>
    <label for="gender">Gender : </label>
    <span><input type="radio" name="gender" <?php echo $data[2]=="Male"? "checked" : "";?> value="Male">Male
    <input type="radio" name="gender" <?php echo $data[2]=="Female"? "checked" : "";?> value="Female">Female <br></span>
    <label for="start_date">start_date : </label>
    <span><input type="date" name="start_date" value="<?php echo $data[3];?>"><br></span>
    <label for="time">last_login : </label>
    <span><input type="time" name="last_login" value="<?php echo date("H:i", strtotime($data[4]));?>"><br></span>
    <label for="salery">salery : </label>
    <span><input type="text" name="salery" value="<?php echo $data[5];?>"><br></span>
    <label for="bonus">bonus : </label>
    <span><input type="text" name="bonus" value="<?php echo $data[6];?>"><br></span>
    <label for="managment">managment : </label>
    <span><input type="text" name="managment" value="<?php echo $data[7];?>"><br></span>
    <label for="team">team : </label>
    <span><input type="text" name="team" value="<?php echo $data[8];?>"><br></span>
    <input type="submit" value="submit">
</form>