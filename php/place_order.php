<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "computers");
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

// Calculate order totals
$subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['product_price'] * $item['qty'];
}

$delivery = 12.99;
$tax = round($subtotal * 0.13, 2);
$total = $subtotal + $delivery + $tax;

// Insert into orders table
$order_sql = "INSERT INTO orders (user_id, order_date, total_amount)
              VALUES (?, NOW(), ?)";
$stmt = $conn->prepare($order_sql);
$stmt->bind_param("id", $_SESSION['user_id'], $total);
$stmt->execute();

$order_id = $stmt->insert_id;   // Get new order ID

// Insert items into order_items table
$item_sql = "INSERT INTO order_items (order_id, product_name, product_image, price, quantity)
             VALUES (?, ?, ?, ?, ?)";
$item_stmt = $conn->prepare($item_sql);

foreach ($_SESSION['cart'] as $item) {
    $item_stmt->bind_param(
        "issdi",
        $order_id,
        $item['product_name'],
        $item['product_image'],
        $item['product_price'],
        $item['qty']
    );
    $item_stmt->execute();
}

// Clear cart
unset($_SESSION['cart']);

// Redirect to order success page
header("Location: order_success.php?order_id=$order_id");
exit();
?>