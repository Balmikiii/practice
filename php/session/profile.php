<?php
session_start();
if (!isset($_SESSION['user'])) {
    // Session exists, user is logged in, or you can perform any other action here
    header('Location: ../login/index.html');
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>you are loged in your deteil</h1>
    <a href="ses_end.php">logout</a>
</body>
</html>