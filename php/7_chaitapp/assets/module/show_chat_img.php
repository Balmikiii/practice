<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <div class="row">

    <?php
        session_start();
        include 'class.php';
        $sender = $_SESSION['user_id'];
        $receiver = $_SESSION['receiver_id'];

        $sql = 'SELECT file FROM message_text WHERE receiver_id = '.$sender.' AND sender_id = '.$receiver.' OR sender_id = '.$sender.' AND receiver_id = '.$receiver;
        $rows = $db->rows($db->query($sql));
        foreach($rows as $image){
            if($image['file'] != null){
                echo '<div class="col-md-3 text-center">
                <div class="thumbnail">
                    <img src="../img/chait_img/'.$image['file'].'" alt="" class="w-100">
                    <p>'.$image['file'].'</p>                    
                </div>
                </div>';
                }
            }
    ?>
  </div>
</div>
</body>
</html>


