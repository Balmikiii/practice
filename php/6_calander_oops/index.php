<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calander</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
<?php
     include 'assets/module/functions.php';
 ?>
<div class="container border">
    <div class="container-fluid top_are d-flex justify-content-between p-3">
            <span class="d-flex">
                <span class="btn-group month">
                    <button class="btn btn-dark btn_click" type="button" onclick='move_back_button();'><i class="fa-solid fa-less-than"></i></button>
                    <button class="btn btn-dark" type="button" onclick='move_button();'><i class="fa-solid fa-greater-than"></i></button>
                </span> 
                
                <span class="btn-group week">
                    <button class="btn btn-dark btn_click" type="button" onclick='week_back_button();'><i class="fa-solid fa-less-than"></i></button>
                    <button class="btn btn-dark" type="button" onclick='week_button();'><i class="fa-solid fa-greater-than"></i></button>
                </span> 
                
                <a href="index.php"><span class="btn btn-dark">today</span></a>
            </span>
            <h3><?php echo "<span  id='header-details'>".$cal->month_name . "</span> <span id=hearder_yers>" .  $cal->year."</span>"; ?></h3>
            <span class="btn-group">
                <button class="btn btn-dark" type="button" onclick="month_page();">month</button>
                <button class="btn btn-dark" type="button" onclick="weeks_page();">week</button>
                <button class="btn btn-dark" type="button" onclick="weeks_page();">day</button>
                <button class="btn btn-dark" type="button" onclick="weeks_page();">list</button>
            </span>
        </div>
        <div class="show_table"></div>
        <div class="container w-50 events-form"></div>
    </div>
    <script src="assets/js/index.js"></script>
    <?php
        if(isset($_GET['update'])){
        echo "
            <script>
            str = ".($_GET['month']-1).";
            countyear = ".$_GET['year'].";
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    show_table.innerHTML = this.responseText;
                    }
                    };
                    xmlhttp.open('GET', 'assets/module/month.php?month=".($_GET['month'])."&year=".$_GET['year']."', true);        
                    xmlhttp.send();
                    week.style.display = 'none';
                    document.getElementById('header-details').innerHTML = header_month[str];
                    document.getElementById('hearder_yers').innerHTML = countyear;
                    setTimeout(selectable_td, 1000);
                    </script>
                    ";
        }else{
            echo "
            <script>
            month_page();
            </script>
            ";
        }

    ?>
</body>
</html>