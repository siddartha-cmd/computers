<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "computers");
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

$order_id = intval($_GET['order_id']);
$user_id = $_SESSION['user_id'];

// =========================
// GET ORDER INFO
// =========================
$sql = "SELECT * FROM orders WHERE order_id = $order_id AND user_id = $user_id LIMIT 1";
$order = $conn->query($sql)->fetch_assoc();

if (!$order) {
    die("Invalid order or access denied.");
}

// =========================
// GET ORDER ITEMS
// =========================
$sql_items = "SELECT product_name, product_image, price, quantity 
              FROM order_items 
              WHERE order_id = $order_id";

$items = $conn->query($sql_items);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Details</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>

<body class="orders-bg">

<?php include 'navbar.php'; ?>

<div class="orders-container">

    <h1>Order #<?php echo $order_id; ?></h1>
    <p>Date: <?php echo $order['order_date']; ?></p>
    <p>Total Paid: $<?php echo number_format($order['total_amount'], 2); ?></p>

    <table class="orders-table">
        <tr>
            <th>Product</th>
            <th>Image</th>
            <th>Qty</th>
            <th>Price</th>
            <th>Subtotal</th>
        </tr>

        <?php if ($items->num_rows > 0): ?>
            <?php while ($row = $items->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['product_name']; ?></td>

                    <td>
                        <img src="../img/products/<?php echo $row['product_image']; ?>" 
                             class="order-img" 
                             style="width:80px; border-radius:8px;">
                    </td>

                    <td><?php echo $row['quantity']; ?></td>

                    <td>$<?php echo number_format($row['price'], 2); ?></td>

                    <td>$<?php echo number_format($row['price'] * $row['quantity'], 2); ?></td>
                </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5" style="text-align:center; padding:20px;">
                    <strong>No order items found.</strong><br>
                    (This means the checkout page did not save items)
                </td>
            </tr>
        <?php endif; ?>

    </table>

    <a href="my_orders.php" class="order-btn" style="margin-top:20px; display:inline-block;">
        Back to My Orders
    </a>

</div>

</body>
</html>