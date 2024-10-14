<?php 
    include "assets/all_class.php";
    include "assets/functioins.php";
    $db = new db_connection();
    $table = new table_operations();

    if ($table->count < 1){
        data_store_from_csv();
    }
    if (!empty($_GET['pages'])){
        $pages = $_GET['pages'];
        if ($_GET['pages']<0){
            $pages = floor($table->count/10);
        }else if($_GET['pages']>floor($table->count/10)){
            $pages = 0;
        }
    }else{
        $pages = 0;
    }
    if (!empty($_GET['search'])){
        $search = $_GET['search'];
    }else{
        $search = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>csv_to_databse</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form">
        <form action="index.php" method="get">
            <div class="input">
                <?php 
                    echo "<input type=search id=search onkeyup=showdatas(this.value,".$pages.")>";
                ?>
                <a href=index.php><button>Reset</button></a><br>
                    <?php echo "<p>Page No. = <span id='alerttt'>".($pages+1)."</span></p>";?>
            </div>
        </form>
    </div>
    
    <div id="showup"></div>
    <div id="all_data_show">
        <?php
         $table->all_print($pages);
         ?>
    </div>
    <div id="delete"></div>
    <div id="form"></div>
    <?php
        
        
        // $table->all_print_desc();

        
        // $table->update(1000,"balmikii","male","28-10-2024","14:28",100,2.25,"php backend","fesher");
        // $table->insert("balmikii","male","28-10-2024","14:28",100,2.25,"php backend","experienced");

        if((!empty($_GET['id'])) && (!empty($_GET['name']))){
            $table->update($pages,$_GET['id'],$_GET["name"],$_GET["gender"],$_GET["start_date"],$_GET["last_login"],$_GET["salery"],$_GET["bonus"],$_GET["management"],$_GET["team"]);
        }
    ?>
    <script src="assets/js/index.js"></script>
</body>
</html>