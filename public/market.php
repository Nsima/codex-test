<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

$orders = $pdo->query('SELECT * FROM orders ORDER BY id DESC')->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Market Trading</title>
</head>
<body>
    <h1>Market Trading</h1>
    <p>This is a simplified order book.</p>
    <table border="1">
        <tr><th>ID</th><th>User</th><th>Side</th><th>Amount</th><th>Price</th></tr>
        <?php foreach ($orders as $order): ?>
            <tr>
                <td><?php echo $order['id']; ?></td>
                <td><?php echo $order['user_id']; ?></td>
                <td><?php echo $order['side']; ?></td>
                <td><?php echo $order['amount']; ?></td>
                <td><?php echo $order['price']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="dashboard.php">Back</a></p>
</body>
</html>
