<?php
    include 'class.php';
    include 'functions.php';
    session_start();
    date_default_timezone_set('Asia/Kolkata');
    if(!empty($_GET['q'])){
        $sql = "select * from users where name like '".$_GET['q']."%'";
        $result = $db->query($sql);
        $rows = $db->rows($result);
        foreach($rows as $row){
            if($row['id']==$_SESSION['user_id']){
                $user_name = $row['name'];
                continue;
            }
            echo '<li class="clearfix" onclick="chat_headerf('.$row['id'].');">
                    <img src="./assets/img/'.$row['image'].'" alt="avatar">
                    <div class="about">
                        <div class="name">'.$row['name'].'</div>';
                        if($row['isactive']==1){
                            echo '<div class="status"><i class="fa fa-circle online"></i> online</div>';
                        }else{
                            $stored_time = (date('H', strtotime($row['last_login']))*3600 + date('i', strtotime($row['last_login']))*60);
                            $now_time = ((date("H",time())*3600)+date("i",time())*60);
                            $left_chat = (($now_time - $stored_time)/60);
                            $date1 = date_create(date("Y-m-d",(strtotime("today"))));
                            $date2 = date_create(date("Y-m-d",(strtotime($row['last_login']))));
                            $diff = date_diff($date1,$date2);

                            if(($left_chat<60) && ($diff->days==0)){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>left '.($left_chat+1).' mins ago</div>';
                            }else if(date("H",time())-date('H', strtotime($row['last_login']))>0 &&  ($diff->days==0)){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>left '.ceil($left_chat/60).' hours ago</div>';
                            }else if($diff->days==1){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>yesterday, '.date('h:ia', strtotime($row['last_login'])).'</div>';
                            }else if($diff->days > 1 && $diff->days < 6){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>Last seen, '.date("l", (strtotime($row['last_login']))).'</div>';
                            }else if(date("Y",time()) != date('Y', strtotime($row['last_login']))){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>offline since '.date("d-m-y", strtotime($row['last_login'])).'</div>';
                            }else{
                                echo '<div class="status"><i class="fa fa-circle offline"></i>offline since '.date("M d", strtotime($row['last_login'])).'</div>';
                            }
                        }
                echo '</div>
            </li>';
        }
    }else{
        $sql = "SELECT * FROM users";
        $result = $db->query($sql);
        $rows = $db->rows($result);
        foreach($rows as $row){
            if($row['id']==$_SESSION['user_id']){
                $user_name = $row['name'];
                continue;
            }
            echo '<li class="clearfix" onclick="chat_headerf('.$row['id'].');">
                    <img src="./assets/img/'.$row['image'].'" alt="avatar">
                    <div class="about">
                        <div class="name">'.$row['name'].'</div>';
                        if($row['isactive']==1){
                            echo '<div class="status"><i class="fa fa-circle online"></i> online</div>';
                        }else{
                            $stored_time = (date('H', strtotime($row['last_login']))*3600 + date('i', strtotime($row['last_login']))*60);
                            $now_time = ((date("H",time())*3600)+date("i",time())*60);
                            $left_chat = (($now_time - $stored_time)/60);
                            $date1 = date_create(date("Y-m-d",(strtotime("today"))));
                            $date2 = date_create(date("Y-m-d",(strtotime($row['last_login']))));
                            $diff = date_diff($date1,$date2);

                            if(($left_chat<60) && ($diff->days==0)){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>left '.($left_chat+1).' mins ago</div>';
                            }else if(date("H",time())-date('H', strtotime($row['last_login']))>0 &&  ($diff->days==0)){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>left '.ceil($left_chat/60).' hours ago</div>';
                            }else if($diff->days==1){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>yesterday, '.date('h:ia', strtotime($row['last_login'])).'</div>';
                            }else if($diff->days > 1 && $diff->days < 6){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>Last seen, '.date("l", (strtotime($row['last_login']))).'</div>';
                            }else if(date("Y",time()) != date('Y', strtotime($row['last_login']))){
                                echo '<div class="status"><i class="fa fa-circle offline"></i>offline since '.date("d-m-y", strtotime($row['last_login'])).'</div>';
                            }else{
                                echo '<div class="status"><i class="fa fa-circle offline"></i>offline since '.date("M d", strtotime($row['last_login'])).'</div>';
                            }
                        }
                echo '</div>
            </li>';
        }
    }
?>
