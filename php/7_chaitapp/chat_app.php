<?php

    include 'assets/module/class.php';
    include 'assets/module/functions.php';
    session_start();

    if(empty($_SESSION['user_id'])){
        if(isset($_POST['logein'])){
            if(!empty($_POST['email']) && !empty($_POST['pwd'])){
                check($_POST['email'],$_POST['pwd']);
            }else{
                header("location:index.php?alert=3");
            }
        }else if(isset($_POST['signup'])){
            if(!empty($_POST['email']) && !empty($_POST['pwd']) && !empty($_POST['name'])){
                insert($_POST['name'],$_POST['email'],$_POST['pwd'],$_FILES["file"]);
            }else{
                header("location:index.php?alert=3");
            }
        }else{
            header("location:index.php?alert=1");
        }
    }
    // vaidation login and chek details

    // insert msg
    if(isset($_POST["content"])){
        if(!empty($_POST["content"])){
            content_insert($_POST["content"],$_SESSION['user_id'],$_SESSION['receiver_id']);
            header("location:chat_app.php");
        }
    }

?> 
<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>chat app - Bootdey.com</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/chait_app.css">
    <!-- <meta http-equiv="refresh" content="1"> -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
</head>
<body>


<div class="container">
    <div class="row clearfix">
        <div class="col-lg-12">
            <div class="card chat-app">
                <div id="plist" class="people-list">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fa fa-search"></i></span>
                        </div>
                        <input type="text" class="form-control" onkeyup="people_list(this.value)" placeholder="Search...">
                    </div>
                    <ul class="list-unstyled chat-list mt-2 mb-0">
                        <?php
                            $sql = "SELECT * FROM users";
                            $result = $db->query($sql);
                            $rows = $db->rows($result);
                            date_default_timezone_set('Asia/Kolkata');
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
                        ?>
                    </ul>
                </div>
                <div class="chat">
                    
                    <div class="chat-header clearfix">
                        <div class="row">
                            <div class="col-lg-6">
                                <a href="javascript:void(0);" data-toggle="modal" data-target="#view_info">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="avatar">
                                </a>
                                <div class="chat-about">
                                    <h6 class="m-b-0"><?php echo $user_name;?></h6>
                                    <small><i class="fa fa-circle online"></i> online</small>
                                </div>
                            </div>
                            <div class="col-lg-6 hidden-sm text-right">
                                <a href="javascript:void(0);" class="btn btn-outline-secondary"><i class="fa fa-camera"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-primary"><i class="fa fa-image"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-info"><i class="fa fa-cogs"></i></a>
                                <a href="javascript:void(0);" class="btn btn-outline-warning"><i class="fa fa-question"></i></a>
                                <a href="assets/module/sesion.php" class="btn btn-danger">Log out</a>
                            </div>
                        </div>
                    </div>

                    <div class="chat-history chait_box_chiting">
                        <!-- chat load in side -->
                    </div>
                    <div class="chat-message clearfix">
                        <form action="chat_app.php" method="post">
                            <div class="input-group mb-0">
                                <div class="input-group-prepend">
                                    <button class="input-group-text" type="submit"><i class="fa fa-send"></i></button>
                                </div>
                                <input type="text" class="form-control" name="content" placeholder="Enter text here..." autocomplete="off">                                    
                            </div>
                        </form>            
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/new.js"></script>
<?php 

    // if(!empty($_SESSION['receiver_id'])){
        echo '
        <script>
            chat_open('.$_SESSION['receiver_id'].');
            
        </script>
        ';
    // }
    
?>
</body>
</html>