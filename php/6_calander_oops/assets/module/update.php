<?php 
    include 'class.php';
    
    $yers = date_format(date_create($_GET['date']),'Y');
    $month = date_format(date_create($_GET['date']),'m');
    if(isset($_GET['dates'])){
        $dates = explode(",",$_GET['dates']);
        for($i=0;$i<count($dates);$i++){
            $make_dates = "'".$yers."-".$month."-".$dates[$i]."'";
            $chek_data = "SELECT * FROM add_events WHERE date = ".$make_dates;
            $db->query($chek_data);
            if($db->query($chek_data)->num_rows > 0){
                $sql = "UPDATE add_events SET msg = '".$_GET['events']."' WHERE date = ".$make_dates;
                $db->query($sql);  
            }else{
                $sql = "INSERT INTO add_events(date,msg)VALUES(".$make_dates.",'".$_GET['events']."')";
                $db->query($sql); 
            }
        }
    }else{
        $chek_data = "SELECT * FROM add_events WHERE date='".$_GET['date']."'";
        $db->query($chek_data);
        if($db->query($chek_data)->num_rows > 0){
            $sql = "UPDATE add_events SET msg = '".$_GET['events']."' WHERE date = '".$_GET['date']."'";
        }else{
            $sql = "INSERT INTO add_events(date,msg)VALUES('".$_GET['date']."','".$_GET['events']."')";
        }
        $db->query($sql);
    }
    header("location:../../index.php?update=yes&month=".$month."&year=".$yers);
?>