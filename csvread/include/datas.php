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
        if(empty($_GET["page"])||($_GET["page"]>floor(count($datastored)/10))){
            $page = 0;
        }else if(($_GET["page"]<0)){
            $page = floor(count($datastored)/10)-1;
        }else{
            $page = $_GET['page'];
        }
        if (((count($datastored)-1)==($page*10))||((count($datastored))==($page*10))){
            $page = ($page-1);
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
                echo "<th colspan='2'>Action</th></tr>"; 
            }

            for ($i=(($page*10)+1); $i<=(($page*10)+10); $i++){
                echo "<tr><td>$i</td>";
                    for ($j=0; $j<count($datastored[$i]); $j++){
                        if ($j==3){
                            echo "<td>".date("h:i A", strtotime($datastored[$i][$j]))."</td>";
                        }else{
                            echo "<td>".$datastored[$i][$j]."</td>";
                        }
                    } 
                echo "<td><button id='editbtn' value=".$i." class='editbtn' onclick='formshow(".$i.");'>Edit</button>
                    </td><td><button value=".$i."' class='delbtn' onclick='delete_func(".$i.");'>Delete</button></td>
                </tr>";
                if ($i==count($datastored)-1){
                    break;
                }                
            }
            echo "</table>";                
            echo "<div class=pagejump>
                    <div class='pagination'><a href=index.php?page=".($page-1)."></a>
                        <a href=index.php?page=".($page-1)."><button><</button></a>";
                        for ($i=0; $i<(count($datastored)); $i++){
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
                        </div>
                        </div>
                    </div>";
            
        ?>
    </div>