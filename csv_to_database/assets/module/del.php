<?php
    include "conection_db.php";
    $id = (int)$_GET['id'];
    $sql = "DELETE FROM csv_datas WHERE sr_no = $id";
    $conn->query($sql);
?>