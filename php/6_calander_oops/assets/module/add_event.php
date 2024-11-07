<?php
    include 'class.php';
    $getdate = explode(",",$_GET['date']);
    sort($getdate);
    $msg = [];
    if(count($getdate)>1){
        $date = date('Y-m-d',strtotime($_GET['year']."-".$_GET['month']));
        for ($i=0;$i<count($getdate);$i++){
            $chek_data = "SELECT * FROM add_events WHERE date = '".date('Y-m-d',strtotime($_GET['year']."-".$_GET['month']."-".$getdate[$i]))."'";
            if($db->query($chek_data)->num_rows > 0){
                foreach($db->rows($db->query($chek_data)) as $row){
                    if(in_array($row['msg'], $msg)){
                        continue;
                    }
                    $msg [] = $row['msg'];
                }
            }
        }
    }else{
        $date = date('Y-m-d',strtotime($_GET['year']."-".$_GET['month']."-".$_GET['date']));
        $chek_data = "SELECT * FROM add_events WHERE date='".$date."'";
        if($db->query($chek_data)->num_rows > 0){
            $msg = $db->rows($db->query($chek_data))[0]['msg'];
        }
    }
    
?>
<button class="close_form" onclick="close_button();">X</button>
<form action="assets/module/update.php" method="get">
    <div class="m-5">
        <label for="events" class="form-label">Add events</label>
        <input type="date" hidden name="date" value="<?php echo $date ;?>">
        <?php
            if(count($getdate)>1){
                echo "<input type='text' hidden name='dates' value=". implode(",",$getdate) .">";
                echo "<textarea  type='text' rows='5' class='form-control' name='events'>".implode(" ",$msg)."</textarea>";
            }else{
                if(is_array($msg)){
                    echo "<textarea  type='text' rows='5' class='form-control' name='events'></textarea>";
                }else{
                    echo "<textarea  type='text' rows='5' class='form-control' name='events'>".trim($msg)."</textarea>";
                }
            }
        ?>
        <button type="submit" class="btn btn-dark w-100 mt-5">Submit</button>
    </div>
</form>

