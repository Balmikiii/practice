<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php
// remove all session variables
session_unset();

// destroy the session
// session_destroy();

if (isset($_SESSION['user'])) {
    // Session exists, user is logged in, or you can perform any other action here
} else {
    // Session does not exist, user is not logged in
    // Redirect to the index or login page
    header('Location: ../login/index.html');
    exit; // Make sure to exit to stop the script execution
}

?>

</body>
</html>