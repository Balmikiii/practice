<?php
    include 'class.php';
    function table_td($month,$years,$today){
        global $cal;
        global $db ;
        $td = 0;
        $cal = new calander($month,$years);
        $date = 0;

        $next_month_count_days = date("w", mktime(0, 0, 0, ($cal->month+1),1,$cal->year));
        for ($j=((31)-$cal->skeep_day); $j<31; $j++){
            echo "<td class=change>$j</td>";
            $td += 1;
        }
        for ($i=1; $i<=$cal->days; $i++){
            if ($i==$today){                
                echo "<td class='bg-dark text-light' onclick='event_add(".$years.",".$month.",".$i.");'><div>".$i."</div>";
                if($db->query("SELECT * FROM add_events WHERE date = '".$years."-".$month."-".$i."'")->num_rows > 0){
                    echo "<p class='bg-info'>".$db->rows($db->query("SELECT * FROM add_events WHERE date = '".$years."-".$month."-".$i."'"))[0]['msg']."</p>";
                }
                echo "</td>"; 
            }else{                
                echo "<td onclick='event_add(".$years.",".$month.",".$i.");'><div>".$i."</div>";
                if($db->query("SELECT * FROM add_events WHERE date = '".$years."-".$month."-".$i."'")->num_rows > 0){
                    echo "<p class='bg-info text-light'>".$db->rows($db->query("SELECT * FROM add_events WHERE date = '".$years."-".$month."-".$i."'"))[0]['msg']."</p>";
                }

                echo "</td>";

            }
            $td += 1;
            if ($td%7==0){
                echo "</tr><tr>"; 
            }
        }
        if ((7-$next_month_count_days)!=7){
            for ($k=1;$k<=(7-$next_month_count_days); $k++){
                echo "<td class=change>$k</td>";
            }
        }
    }

    
?>