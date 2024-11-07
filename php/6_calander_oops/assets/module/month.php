<?php
    include 'functions.php';
    $month =$cal->month;
    $years=$cal->year;
    if(isset($_GET['year'])){
        $years=$_GET['year'];
    }
    if(isset($_GET['month'])){
        $month =$_GET['month'];
        if ($_GET['month']==13){
            $month = 1;
            $years += 1; 
        }
        if ($_GET['month']==0){
            $month = 12;
            $years -= 1; 
        }
    }
    $cal = new calander($month,$years);
?>
<!-- dragtext -->
<p id="drag3" draggable="true" ondragstart="drag(event)" class="bg-warning">my events on the day</p>

<table class="table table-bordered firs-table" id="table-select" ondrop='drop(event)' ondragover='allowDrop(event)'>
    <tr class="text-center">
        <th>Sun</th>
        <th>Mon</th>
        <th>Tue</th>
        <th>Wed</th> 
        <th>Thu</th>
        <th>Fri</th>
        <th>Sat</th>
    </tr>
    <tr>
    <?php 
        table_td($cal->month,$cal->year,$cal->today);
        ?>
    </tr>
</table>
