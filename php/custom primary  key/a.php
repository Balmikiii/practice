<?php
	$con = new mysqli('localhost','root','');
    if($con->connect_errno > 0){
			die('Unable to connect to database [' . $con->connect_error . ']');  } 
     
            $con->query("CREATE DATABASE IF NOT EXISTS cus_primary");
            
            mysqli_select_db($con,"cus_primary");
            
            $balmiki="CREATE TABLE IF NOT EXISTS msg (
                userid VARCHAR(300) NOT NULL,
                id int(225) NOT NULL auto_increment,
                name varchar(300)NOT NULL,
                email varchar(300)NOT NULL,
                msg varchar(255)NOT NULL,
                PRIMARY KEY(id) )";
           $con->query($balmiki);
           if(isset($_POST['submit'])){
               $name = $_POST['name'];
               $email = $_POST['email'];
               $comment = $_POST['msg'];
            }
            $mydb = "insert into msg (name,email,msg)
            value('$name','$email','$comment')";
            if (mysqli_query($con, $mydb)) {
                $last_id = mysqli_insert_id($con);
                $userid= "STU_".$last_id;
                $quer="UPDATE msg SET userid ='".$userid."' WHERE id= '".$last_id."'";                
                $ress = mysqli_query($con, $quer);
                echo "New record created successfully. Last inserted ID is: " . $userid;
              } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
              }
?>
 