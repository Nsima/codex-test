<?php
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Mini Exchange</title>
</head>
<body>
    <h1>Welcome to Mini Exchange</h1>
    <p><a href="register.php">Register</a> | <a href="login.php">Login</a></p>
</body>
</html>
