<?php
session_start();
require_once '../config/db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit;
}

// Handle new offer creation
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $amount = floatval($_POST['amount'] ?? 0);
    $price = floatval($_POST['price'] ?? 0);
    if ($amount > 0 && $price > 0) {
        $stmt = $pdo->prepare('INSERT INTO p2p_offers (user_id, amount, price) VALUES (:user, :amount, :price)');
        $stmt->execute([':user' => $_SESSION['user_id'], ':amount' => $amount, ':price' => $price]);
    }
}

$offers = $pdo->query('SELECT * FROM p2p_offers ORDER BY id DESC')->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>P2P Offers</title>
</head>
<body>
    <h1>P2P Offers</h1>
    <form method="post">
        <label>Amount: <input type="number" step="0.0001" name="amount" required></label><br>
        <label>Price: <input type="number" step="0.01" name="price" required></label><br>
        <button type="submit">Create Offer</button>
    </form>
    <h2>Existing Offers</h2>
    <table border="1">
        <tr><th>ID</th><th>User</th><th>Amount</th><th>Price</th></tr>
        <?php foreach ($offers as $offer): ?>
            <tr>
                <td><?php echo $offer['id']; ?></td>
                <td><?php echo $offer['user_id']; ?></td>
                <td><?php echo $offer['amount']; ?></td>
                <td><?php echo $offer['price']; ?></td>
            </tr>
        <?php endforeach; ?>
    </table>
    <p><a href="dashboard.php">Back</a></p>
</body>
</html>
