<?php
    include 'assets/module/class.php';
    if(isset($_GET['id'])){
        $sql = "SELECT * FROM users WHERE id = ".$_GET['id'];
        $result = $db->query($sql);
        $rows = $db->rows($result);
    } 

    if($rows[0]['isactive']==1){
        $status = '<i class="fa fa-circle online"></i>online';
    }else{
        date_default_timezone_set('Asia/Kolkata');
        $stored_time = (date('H', strtotime($rows[0]['last_login']))*3600 + date('i', strtotime($rows[0]['last_login']))*60);
        $now_time = ((date("H",time())*3600)+date("i",time())*60);
        $left_chat = (($now_time - $stored_time)/60);
        $date1 = date_create(date("Y-m-d",(strtotime("today"))));
        $date2 = date_create(date("Y-m-d",(strtotime($rows[0]['last_login']))));
        $diff = date_diff($date1,$date2);
        if(($left_chat<60) && ($diff->days==0)){
            $status = '<i class="fa fa-circle offline"></i> left '.($left_chat+1).' mins ago';
        }else if(date("H",time())-date('H', strtotime($rows[0]['last_login']))>0 &&  ($diff->days==0)){
            $status = '<i class="fa fa-circle offline"></i> left '.ceil($left_chat/60).' hours ago';
        }else if($diff->days==1){
            $status = '<i class="fa fa-circle offline"></i>yesterday, '.date('h:ia', strtotime($rows[0]['last_login']));
        }else if($diff->days > 1 && $diff->days < 6){
            $status = '<i class="fa fa-circle offline"></i>Last seen, '.date("l", (strtotime($rows[0]['last_login'])));
        }else if(date("Y",time()) != date('Y', strtotime($rows[0]['last_login']))){
            $status = '<i class="fa fa-circle offline"></i>offline since '.date("d-m-y", strtotime($rows[0]['last_login']));
        }else{
            $status = '<i class="fa fa-circle offline"></i>offline since '.date("M d", strtotime($rows[0]['last_login']));
        }
    }
 
?>
<div class="row">
    <div class="col-lg-6">
        <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
            <img src="./assets/img/<?php echo $rows[0]['image']; ?>" alt="avatar">
        </a>
        <div class="chat-about">
            <h6 class="m-b-0"><?php echo $rows[0]['name']; ?></h6>
            <small><?php echo $status; ?></small>
        </div>
    </div>
    <div class="col-lg-6 hidden-sm text-right">
        <form id="form" action="assets/module/image_upload.php" method="post" enctype="multipart/form-data">  
            <a href="javascript:void(img_upload(<?php echo $_GET['id'];?>));" class="btn btn-outline-secondary">
                    <label for="file" class="mb-0"><i class="fa fa-camera"></i></label>
                    <input id="file" type="file" name="file[]" class="d-none" multiple/>
            </a>
            <button type="submit" class="d-none">upload</button>

            <!-- <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a> -->
            <a href="assets/module/show_chat_img.php" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
            <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
            <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
            
            <a href="assets/module/sesion.php" class="btn btn-danger">Log out</a>
        </form> 
    </div>
</div>
