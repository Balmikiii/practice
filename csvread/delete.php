<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>delete</title>
    <style>
        table{
            width: 80%;
            margin : auto;
            text-align:center;
        }
        table,td,th{
            border : 1px solid black;
            border-collapse : collapse;
        }
    </style>
</head>
<body>
    <?php
        if($_GET['id']) {
            $id = $_GET['id'];
            $datastored = [];
            $datasapend = [];
            $file = fopen("employees.csv", "rw"); 
            while (($data = fgetcsv($file,1000,",")) !==FALSE){ 
                $datastored[] = $data;
            } 
            fclose($file);
        }
        for($i=0;$i<count($datastored);$i++){
            if ($id!=$i){
                $datasapend[]= $datastored[$i];
            }

        }
        $file_delete = fopen("employees.csv","w");
        foreach($datasapend as $aaryline){
            fputcsv($file_delete, $aaryline);
        }
        fclose($file_delete);
        if ($id%10==0){
            header("location:index.php?page=".(floor($id/10)-1));
        }else{
            header("location:index.php?page=".floor($id/10));
        }
    ?>
</body>
</html>