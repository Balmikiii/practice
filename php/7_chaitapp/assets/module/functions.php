<?php
    function insert($name,$email,$pwd,$file){
        global $db;
        $sql = "SELECT * FROM users WHERE email = '".$email."'";
        $result = $db->query($sql);
        if($result->num_rows>0){
            header("location:index.php?alert=2");
        }else{
            date_default_timezone_set('Asia/Kolkata');
            $target_file = "assets/img/".basename($_FILES["file"]["name"]);
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            move_uploaded_file($_FILES["file"]["tmp_name"], $target_file);

            $sql = "INSERT INTO users(name,email,password,last_login)VALUES('".$name."','".$email."','".$pwd."','".date("Y-m-d H:i:s",time())."')";
            $db->query($sql); 

            $last_id = $name."_".$db->conn->insert_id.".png";
            rename($target_file,"assets/img/".$last_id);

            $_SESSION['user_id'] = $db->conn->insert_id;
            $_SESSION['receiver_id'] = $db->conn->insert_id;
            
            $sql = 'UPDATE users SET image = "'.$last_id.'" WHERE id = '.$db->conn->insert_id;
            $db->query($sql); 
        }
    }

    function check($email,$pwd){
        global $db;
        $sql = "SELECT * FROM users WHERE email = '".$email."' AND password = '".$pwd."'";
        $result = $db->query($sql);
        $rows = $db->rows($result);
        if(!$result->num_rows>0){
            header("location:index.php?alert=1");
        }
        foreach($rows as $row){
            $_SESSION['user_id'] = $row['id'];
            $_SESSION['receiver_id'] = $row['id'];
            date_default_timezone_set('Asia/Kolkata');
            $currant_time = (date("Y-m-d H:i:s",time()));
            $sql = "UPDATE `users` SET `isactive`='1',`last_login`='".$currant_time."' WHERE id=".$row['id'];
            $db->query($sql);
        }
    }

    function content_insert($message,$sender,$receiver){
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
        $sql = "INSERT INTO message_text(message_text,sender_id,receiver_id,conversations_id,unique_time)VALUES('".$message."','".$sender."','".$receiver."','".$conversions_id."','".time()."')";
        $db->query($sql); 
    }

?>