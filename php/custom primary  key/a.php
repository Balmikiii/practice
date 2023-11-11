<?php
	$con = new mysqli('localhost','root','');
    if($con->connect_errno > 0){
			die('Unable to connect to database [' . $con->connect_error . ']');  } 
     
            $con->query("CREATE DATABASE IF NOT EXISTS cus_primary");
            
            mysqli_select_db($con,"cus_primary");
            
            $balmiki="CREATE TABLE IF NOT EXISTS msg (
                custom_prefix VARCHAR(3) NOT NULL,
                id int(11) NOT NULL auto_increment,
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
            
            $mydb = "insert into msg (custom_prefix,name,email,msg)
            value('STU','$name','$email','$comment')";
            $query = mysqli_query ($con,$mydb);
            echo "success your data send to balmiki";
            // header('location:contact.php');
            
            // if (mysqli_query($con, $mydb)) {
            //     $last_id = mysqli_insert_id($con);
            //     echo "New record created successfully. Last inserted ID is: " . $last_id;
            //   } else {
            //     echo "Error: " . $sql . "<br>" . mysqli_error($con);
            //   }

            
?>
 