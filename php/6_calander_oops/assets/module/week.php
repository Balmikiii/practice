<?php
    include 'functions.php';
?>
<table class="table table-bordered">
    <tr class="text-center">
        <?php
            $weekname = ['Sun','Mon','Tue','Wed','Thu','Fri','Sat'];
            for($i=0;$i<8;$i++){
                if($i!=0){
                    if(($i-1)==$cal->datearry['wday']){
                        echo "<td class='bg-dark text-light'>".$weekname[$i-1]." ".$cal->month."/".$cal->today+($i-$cal->datearry['wday']-1)."</td>";
                    }else{
                        echo "<td>".$weekname[$i-1]." ".$cal->month."/".$cal->today+($i-$cal->datearry['wday']-1)."</td>";
                    }
                }else{
                    echo "<td></td>";
                }
            }
        ?>
    </tr>
    <?php
        for($i=0;$i<25;$i++){
            echo "<tr class='text-center'>";
                for($j=0;$j<8;$j++){
                    if($i==0 && $j==0){
                        echo "<td>all-day</td>";
                    }else if($i!=0 && $j==0){
                        if($i==1){
                            echo "<td>12am</td>";
                        }else if($i>1 && $i<13){
                            echo "<td>".($i-1)."am</td>";
                        }else if($i==13){
                            echo "<td>12pm</td>";
                        }else{
                            echo "<td>".($i-13)."pm</td>";
                        }
                    }else{
                        if ($j==$cal->datearry['wday']+1){
                            echo "<td class='bg-dark text-light'></td>";
                        }else{
                            echo "<td></td>";
                        }
                    }
                }
            echo "</tr>";
        }
    ?>
</table>