<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard</h1>
    <p>Welcome, user #<?php echo $_SESSION['user_id']; ?></p>
    <ul>
        <li><a href="p2p_offers.php">P2P Offers</a></li>
        <li><a href="market.php">Market Trading</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</body>
</html>
