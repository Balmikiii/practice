<?php
// Start the session
session_start();

?>
<!DOCTYPE html>
<html>
<body>

<?php

$servername = "localhost";
$dusername = "root";
$dpassword = "";
$dbname = "cus_primary";

// Create a connection
$conn = new mysqli($servername, $dusername, $dpassword, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST["user"];
$pwd = $_POST["pwd"];
$sql = "SELECT * FROM msg WHERE user = '$user' and pwd='$pwd'";

$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $username = $row['user'];
    $password = $row['pwd'];
    // You now have the username and password in the respective variables

    // Set session variables
    $_SESSION["user"] = $username;
    $_SESSION["pwd"] = $password;
    // echo "Session variables are set.";
    header('Location: a.php');
    

} else {
    // echo "User not found or multiple users with the same username."; 
    header('Location: ../index.html');
}

$conn->close();

?>
<a href="a.php">clic</a>
<a href="ses_end.php">distroy</a>

</body>
</html>