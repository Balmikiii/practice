<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>calender</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
        $monthselect = date("m");
        $yersselect = date("Y");
        if(isset($_GET['month']) && isset($_GET['year'])){
           $monthselect =$_GET['month'];
            $yersselect=$_GET['year'];
            if ($_GET['month']==13){
                $monthselect = 1;
                $yersselect += 1; 
            }
            if ($_GET['month']==0){
                $monthselect = 12;
                $yersselect -= 1; 
            }
        }   
        $day = cal_days_in_month(CAL_GREGORIAN,$monthselect,$yersselect);
        $month_name = date("F", mktime(0, 0, 0, $monthselect,1, $yersselect));
        $weekstart = date("l", mktime(0, 0, 0, $monthselect,1, $yersselect));
        $countday = date("w", mktime(0, 0, 0, $monthselect,1, $yersselect));

        if (isset($_GET['month']) && isset($_GET['year'])){
            $bday = cal_days_in_month(CAL_GREGORIAN,1,$yersselect-1);
        }else{
            $bday = cal_days_in_month(CAL_GREGORIAN,($monthselect-1),$yersselect);
        }
        $bmonth_name = date("F", mktime(0, 0, 0, ($monthselect-1),1, $yersselect));
        $bweekstart = date("l", mktime(0, 0, 0, ($monthselect-1),1, $yersselect));
        $bcountday = date("w", mktime(0, 0, 0, ($monthselect-1),1, $yersselect));

        $acountday = date("w", mktime(0, 0, 0, ($monthselect+1),1, $yersselect));
    ?>
    <table>
        <caption><b><?php echo $month_name . " " .  $yersselect; ?></b></caption>
        <tr>
            <th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th>
        </tr>
        <tr>
        <?php
        $td = 0;
        for ($j=(($bday+1)-$countday); $j<=$bday; $j++){
            echo "<td class=change>$j</td>";
            $td += 1;
        }
        for ($i=1; $i<=$day; $i++){
            echo "<td>$i</td>";
            $td += 1;
            if ($td%7==0){
                echo "</tr><tr>";
            }
        }
        if ((7-$acountday)!=7){
            for ($k=1;$k<=(7-$acountday); $k++){
                echo "<td class=change>$k</td>";
            }
        }
        ?>
        </tr>
    </table>
    <a href="index.php?month=<?php echo ($monthselect-1).'&year='.$yersselect;?>">Prev</a>
    <a href="index.php?&month=<?php echo ($monthselect+1).'&year='.$yersselect;?>">Next</a>
</body>
</html>