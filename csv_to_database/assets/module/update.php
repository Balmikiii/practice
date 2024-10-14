<?php
    session_start();
    include "conection_db.php";
    $id = $_GET['id'];
    $name = $_GET['name'];
    $gender = $_GET['gender'];
    $start_date = $_GET['start_date'];
    $last_login = $_GET['last_login'];
    $salery = $_GET['salery'];
    $bonus = (float)$_GET['bonus'];
    $management = (string)$_GET['managment'];
    $team = $_GET['team'];
    $sql = "UPDATE csv_datas SET name='".$name."', gender='".$gender."',start_date='".$start_date."',last_login='".$last_login."',salery='".$salery."',bonus='".$bonus."',team='".$team."',management='".$management."' WHERE sr_no=$id";
    $conn->query($sql);
    // header("location:../../index.php?pages=".floor($id/10)-1);
    header("location:".$_SESSION["weburl"]);
?>