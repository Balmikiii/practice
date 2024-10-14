<?php
    include "../all_class.php";
    include "../functioins.php";
    $id = $_GET['id'];
    $db = new db_connection();
    $table = new table_operations();
    // $table->delete(990,995);
    $table->delete($id);
    
?>