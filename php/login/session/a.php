<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// Echo session variables that were set on previous page
echo "user is " . $_SESSION["user"] . ".<br>";
echo "Password is " . $_SESSION["pwd"] . ".<br>";


if (isset($_SESSION['user'])) {
    // Session exists, user is logged in, or you can perform any other action here
} else {
    // Session does not exist, user is not logged in
    // Redirect to the index or login page
    header('Location: ../index.html');
    exit; // Make sure to exit to stop the script execution
}
echo "Session variables are set.";


?>
<a href="profile.php">show your detail</a>
<a href="ses_end.php">distroy</a>
</body>
</html>