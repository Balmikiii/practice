<?php
    include 'class.php';
    // include 'functions.php';
    session_start();

    for( $i=0 ; $i < count($_FILES["file"]["name"]) ; $i++ ) {
        $tmpFilePath = $_FILES['file']['tmp_name'][$i];
        if ($tmpFilePath != ""){
          $newFilePath = "../img/chait_img/".$_FILES['file']['name'][$i];
          if(move_uploaded_file($tmpFilePath, $newFilePath)) {
          }
        }
      }


    date_default_timezone_set('Asia/Kolkata');
    $sender = $_SESSION['user_id'];
    $receiver = $_SESSION['receiver_id'];
    global $db;

    $sql = 'SELECT id FROM conversations WHERE receiver_id = '.$sender.' AND sender_id = '.$receiver.' OR sender_id = '.$sender.' AND receiver_id = '.$receiver;
    $user_chat_room_id = $db->query($sql);
    if(!$user_chat_room_id->num_rows>0){
            $sql = "INSERT INTO conversations(sender_id,receiver_id)VALUES('".$sender."','".$receiver."')";
            $db->query($sql); 
            $sql = 'SELECT id FROM conversations WHERE receiver_id = '.$sender.' AND sender_id = '.$receiver.' OR sender_id = '.$sender.' AND receiver_id = '.$receiver;
            $user_chat_room_id = $db->query($sql);
            $conversions_id = $db->rows($user_chat_room_id)[0]['id'];
    }else{
        $conversions_id = $db->rows($user_chat_room_id)[0]['id'];
    }

    for( $i=0 ; $i < count($_FILES["file"]["name"]) ; $i++ ) {

        $target_file = "../img/chait_img/".basename($_FILES["file"]["name"][$i]);
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        move_uploaded_file($_FILES["file"]["tmp_name"][$i], $target_file);

        $sql = "INSERT INTO message_text(file,sender_id,receiver_id,conversations_id,unique_time)VALUES('".$target_file."','".$sender."','".$receiver."','".$conversions_id."','".time()."')";
        $db->query($sql); 

        $last_id = time()."_".$db->conn->insert_id."_".$sender."_".$receiver.".png";
        rename($target_file,"../img/chait_img/".$last_id);
        
        $sql = 'UPDATE message_text SET file = "'.$last_id.'" WHERE id = '.$db->conn->insert_id;
        $db->query($sql); 
    }

    header("location:../../chat_app.php");

?>