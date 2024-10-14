<?php
    include "../all_class.php";
    include "../functioins.php";
    $db = new db_connection();
    $table = new table_operations();
    $table->print_with_name($_GET['search'],$_GET['pages']);
?>