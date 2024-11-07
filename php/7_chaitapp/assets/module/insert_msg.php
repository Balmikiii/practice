<?php
    include 'class.php';
    include 'functions.php';
    if(isset($_GET["content"])){
        if(!empty($_GET["content"])){
            content_insert($_GET["content"],$_GET['user_id'],$_GET['receiver_id']);
        }
    }
?>