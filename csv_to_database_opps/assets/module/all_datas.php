<?php
    include "../all_class.php";
    include "../functioins.php";
    if (!empty($_GET['pages'])){
        $pages = $_GET['pages'];
    }else{
        $pages = 0;
    }
    $db = new db_connection();
    $table = new table_operations();
    $table->all_print($pages);
?>