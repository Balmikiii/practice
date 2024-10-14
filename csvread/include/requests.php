<?php
    $datastored = [];
    $file = fopen("employees.csv", "r"); 
    while (($data = fgetcsv($file,1000,",")) !==FALSE){ 
        $datastored[] = $data;
    } 
    fclose($file);
        if(empty($_GET["qr"])){
            $q = "";
        }else{
            $q = $_GET['qr'];
        }
        if(empty($_GET["page"])||($_GET["page"]>floor(count($datastored)/10)-1)){
            $page = 0;
        }else if(($_GET["page"]<0)){
            $page = floor(count($datastored)/10)-1;
        }else{
            $page = $_GET['page'];
        }
    ?>