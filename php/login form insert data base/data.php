<?php
    $conn = mysqli_connect("localhost","root","","cus_primary");
    $query = "insert into msg(user,pwd)value('hii','sd')";
    $insert = mysqli_query($conn,$query);


    $conn = new mysqli("localhost","root","","cus_primary");
    $query = "insert into msg(user,pwd)value('hii','sf')";
    $conn->query($query);

    
    $conn = new mysqli("localhost","root","");
    $crete_db = "CREATE DATABASE IF NOT EXISTS zzz";
    $conn->query($crete_db);
        mysqli_select_db($conn,"zzz");
        $table_cre = "CREATE TABLE IF NOT EXISTS d(
        name varchar(200),
        id varchar(300))";
    $conn->query($table_cre);
    $sql="INSERT INTO d(name,id)VALUES('ballu','ll')";
    $conn->query($sql);
?>