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
        include  "include/datas.php";
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
                echo "<tr><th>Sr no.</th>";
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
                    for ($j=0; $j<count($datastored[$i]); $j++){
                        if (($datastored[$i][0]==$val[$k])&&($datastored[$i][2]==$val1[$k])){
                        if($run<80){
                            if ($j==0){
                                echo "<tr><td>$i</td>";
                              }
                            echo "<td>".str_ireplace($q,"<mark>".$q."</mark>",$datastored[$i][$j])."</td>";
                        }
                        $run +=1;
                        }
                    }
                    echo "</tr>";
                }
            }
            echo "</table>";
            echo "<div class=pagejump>
            <div class='pagination'>";
                for ($i=0; $i<count($arrayuniqie)*8; $i++){
                    if ($i%80==0){
                        if ($i/80==0){
                            continue;
                        }
                        if ((($i/80)<6) || ((($i/80)>floor(count($arrayuniqie)/8)-6))){
                                if ($i/80==($uk)){
                                    echo "<a class='serch' href=index.php?qr=".$q."&pages=".($i/80)."><button class='serch btnlight'>".($i/80)."</button></a>";
                                }else{
                                    echo "<a class='serch' href=index.php?qr=".$q."&pages=".($i/80)."><button class='serch'>".($i/80)."</button></a>";                                
                                }
                        }else{
                            echo "<a class='serch' href=index.php?qr=".$q."&pages=".($i/80)."><button class='serch'>.</button></a>";
                        }
                    }
                }
            echo "</div></div><br>";
        }
    ?>

<!-- form fixed popup form -->
    <div id="display_form">
    </div>
    <script src="index.js"></script> 
</body> 
</html>