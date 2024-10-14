<?php
    function data_store_from_csv(){
        global $table;
        $datastored = [];
        $file = fopen("assets/file/employees.csv", "r"); 
        while (($data = fgetcsv($file,1000,",")) !==FALSE){ 
            $datastored[] = $data;
        } 
        fclose($file);
        for ($i=1; $i<count($datastored); $i++){
            $table->insert($datastored[$i][0],$datastored[$i][1],date('Y-m-d',strtotime($datastored[$i][2])),date("h:i a", strtotime($datastored[$i][3])),(int)$datastored[$i][4],(float)$datastored[$i][5],$datastored[$i][6],$datastored[$i][7]);
        }
    }
    
?>