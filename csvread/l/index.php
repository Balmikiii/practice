<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CSV Reader</title>
    <link rel="stylesheet" href="style.css">
</head>
<body> 
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
    <div class="form">
        <form action="index.php" method="get">
            <div class="input">
                <input type="search" id="search" onkeyup="showHint(this.value)">
                <a href=index.php><button>Reset</button></a><br>
                <div>
                    <?php
                        if (!empty($_GET["pages"])){
                            echo "<p id='alerttt'>Page No. = ".$_GET['pages']."</p>";
                        }else{
                            echo "<p id='alerttt'>Page No. = ".$page."</p>";
                        }
                    ?>
                </div>
            </div>
        </form>
    </div>
    <div class="datas">
        <?php
            $table_style = ''; 
            if (!empty($_GET['qr']) && !empty($_GET['pages'])){
                $table_style = "style='display:none'";
            }
            echo "<div class='tables_data' ".$table_style."><table id='tab'>";
            for ($i=0; $i<1; $i++){
                echo "<tr><th>Sr no.</th>";
                    for ($j=0; $j<count($datastored[$i]); $j++){
                        echo "<th>".$datastored[$i][$j]."</th>";
                    }
                echo "</tr>"; 
            }
            for ($i=(($page*10)+1); $i<=(($page*10)+10); $i++){
                echo "<tr><td>$i</td>";
                    for ($j=0; $j<count($datastored[$i]); $j++){
                        echo "<td>".$datastored[$i][$j]."</td>";
                    }
                echo "</tr>";
            }
            echo "</table>";                
            echo "<div class=pagejump>
                    <div class='pagination'><a href=index.php?page=".($page-1)."><button><<</button></a>
                        <a href=index.php?page=".($page-1)."><button><</button></a>";
                        for ($i=0; $i<(count($datastored)-1); $i++){
                            if (($i%10==0)&&($i/10!=0)){
                                if ($i<=50){
                                    if ($page==($i/10)){
                                        echo "<a href=index.php?page=".($i/10)."><button class='btnlight'>".($i/10)."</button></a>";
                                    }else{
                                        echo "<a href=index.php?page=".($i/10)."><button>".($i/10)."</button></a>";
                                    }
                                }else if(($i>50)&&($i<=100)){
                                    echo "<a href=index.php?page=".($i/10)."><button>.</button></a>";
                                }else if($i>(count($datastored)-61)){
                                    if ($page==($i/10)){
                                        echo "<a href=index.php?page=".($i/10)."><button class='btnlight'>".($i/10)."</button></a>";
                                    }else{
                                        echo "<a href=index.php?page=".($i/10)."><button>".($i/10)."</button></a>";
                                    }
                                }
                            }
                        }
                        echo "<a href=index.php?page=".($page+1)."><button>></button></a>
                            <button>>></button>
                        </div>
                        </div>
                    </div>";
            
        ?>
    </div>
    <?php
        echo "<p><span id='txtHint'></span></p>";
        echo "<div class=lastarea>";
        if (!empty($_GET['qr'])){
            $val = [];
            $val1 = [];
            $arrayuniqie = [];
            if ($q !== "") {
                $q = strtolower($q);
                $len=strlen($q);
                $pattern = "/".$q."/i";
                foreach($datastored as $name){
                if (preg_match($pattern, $name[0])) {
                    if (!empty($name[0])){
                    $val[] = $name[0];
                    $val1[] = $name[2];
                    if (!array_search($name[0],$arrayuniqie)){
                        $arrayuniqie[] = $name[0];
                        $arrayuniqie1[] = $name[2];
                    }
                    }
                }
                }
            }
            echo "<div class='withname'><table>";
            for ($i=0; $i<1; $i++){
                echo "<tr>";
                    for ($j=0; $j<count($datastored[$i]); $j++){
                        echo "<th>".$datastored[$i][$j]."</th>";
                    }
                echo "</tr>";
            }
            $run = 0; // per page 10 datas
            $uk = 0; // per page 10 datas
            if (!empty( $_GET['pages'])){
            $uk = $_GET['pages'];
            }
            $tr = 1;
            for ($k=($uk*9); $k<count($arrayuniqie); $k++){
                for ($i=0; $i<count($datastored); $i++){
                    if($tr==1){
                        echo "<tr>";
                      }
                    for ($j=0; $j<count($datastored[$i]); $j++){
                        if (($datastored[$i][0]==$val[$k])&&($datastored[$i][2]==$val1[$k])){
                        if($run<80){
                            echo "<td>".str_ireplace($q,"<mark>".$q."</mark>",$datastored[$i][$j])."</td>";
                        }
                        $run +=1;
                        }else{
                            $tr = 0;
                          }
                    }
                    echo "</tr>";
                }
            }




            echo "</table>";
            echo "<div class=pagejump>
            <div class='pagination'>";
                // for ($i=0; $i<count($arrayuniqie)*8; $i++){
                //     if ($i%80==0){
                //         if ($i/80==0){
                //             continue;
                //         }
                //         if ($i/80==($uk)){
                //             echo "<a class='serch' href=index.php?qr=".$q."&pages=".($i/80)."><button class='serch btnlight'>".($i/80)."</button></a>";
                //         }else{
                //             echo "<a class='serch' href=index.php?qr=".$q."&pages=".($i/80)."><button class='serch'>".($i/80)."</button></a>";
                //         }
                //     }
                // }
                for ($i=0; $i<count($arrayuniqie)*8; $i++){
                    if ($i%80==0){
                        if ($i/80==0){
                            continue;
                        }
                        if ((($i/80)<6) || ((($i/80)>floor(count($arrayuniqie)/8)-6))){
                                if ($i/80==($uk)){
                                    echo "<a class='serch' href=index.php?qr=".$q."&pages=".($i/80)."><button class='serch btnlight'>".($i/80)."</button></a>";
                                }else{
                                    echo "<a class='serch' href=index.php?qr=".$q."&pages=".($i/80)."><button class='serch'>".($i/80)."</button></a>";                                }
                        }else{
                            echo "<a class='serch' href=index.php?qr=".$q."&pages=".($i/80)."><button class='serch'>.</button></a>";
                        }
                    }
                }
            echo "</div></div><br>";
        }
    ?>
    <script src="index.js"></script> 
</body> 
</html>