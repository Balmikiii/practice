<ul class="m-b-0">
    <?php
        include 'assets/module/class.php';
        session_start();
        $_SESSION['receiver_id'] = $_GET['receiver_id'];

        $sql = 'SELECT id FROM conversations WHERE receiver_id = '.$_SESSION['user_id'].' AND sender_id = '.$_GET['receiver_id'].' OR sender_id = '.$_SESSION['user_id'].' AND receiver_id = '.$_GET['receiver_id'];

        $user_chat_room_id = $db->query($sql);
        if($user_chat_room_id->num_rows>0){
            $conversions_id = $db->rows($user_chat_room_id)[0]['id'];
            $sql = 'SELECT users.*, message_text.* FROM users CROSS JOIN message_text WHERE users.id = message_text.sender_id AND conversations_id = '.$conversions_id.' ORDER BY message_text.id DESC';
        
            $rows = $db->rows($db->query($sql));
            date_default_timezone_set('Asia/Kolkata');
            
            foreach($rows as $row){ 
                $date1 = date_create(date("Y-m-d",(strtotime("today"))));
                $date2 = date_create(date("Y-m-d",$row['unique_time']));
                $diff = date_diff($date1,$date2);

                if($diff->days==0){
                    $chat_date = "Today";
                }else if($diff->days==1){
                    $chat_date = "Yesterday";
                }else if($diff->days > 1 && $diff->days < 6){
                    $chat_date = date("l", $row['unique_time']);
                }else if(date("Y",time()) != date('Y', $row['unique_time'])){
                    $chat_date = date("d-m-y", $row['unique_time']);
                }else{
                    $chat_date = date("M d", $row['unique_time']);
                }
                
                echo '<li class="clearfix">';
                if($row['sender_id']==$_SESSION['user_id']){
                    $message_time = date("h:i A",$row['unique_time']);
                    echo '<div class="message-data text-right">
                        <span class="message-data-time">'.$message_time.', '.$chat_date.'</span>
                        <img src="./assets/img/'.$row['image'].'" alt="avatar">
                    </div>';
                    if($row['message_text']==null){
                       echo '<div class="message other-message float-right w-50"><img class="w-100" src="./assets/img/chait_img/'.$row['file'].'" alt="avatar"></div>';
                    }else{
                        echo '<div class="message other-message float-right">'.$row['message_text'].'</div>';
                    }
                    
                }else{
                    $message_time = date("h:i A",$row['unique_time']);
                    echo '<div class="message-data">
                            <span class="message-data-time">'.$message_time.', '.$chat_date.'</span>
                        </div>';
                        if($row['message_text']==null){
                            echo '<div class="message my-message w-50"><img class="w-100" src="./assets/img/chait_img/'.$row['file'].'" alt="avatar"></div>';
                        }else{
                            echo '<div class="message my-message">'.$row['message_text'].'</div>';
                        }
                }
                echo "</li>";
            }
        }
    ?>
</ul>