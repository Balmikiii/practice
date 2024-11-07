<?php
    include 'class.php';
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    $currant_time = (date("Y-m-d H:i:s",time()));
    $sql = "UPDATE `users` SET `isactive`='0',`last_login`='".$currant_time."' WHERE id=".$_SESSION['user_id'];
    $db->query($sql);
    session_unset();
    header("location:../../index.php");
?>