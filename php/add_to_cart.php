<?php
session_start();

$conn = new mysqli("localhost", "root", "", "computers");
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

// Make sure we have product_id
if (!isset($_POST['product_id'])) {
    header("Location: products.php");
    exit();
}

$product_id = intval($_POST['product_id']);

// Get product from database
$sql = "SELECT * FROM product WHERE product_id = $product_id LIMIT 1";
$result = $conn->query($sql);
$product = $result->fetch_assoc();

// If product exists, add to cart
if ($product) {

    // Create cart if not exists
    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    // If product already in cart → increase qty
    if (isset($_SESSION['cart'][$product_id])) {
        $_SESSION['cart'][$product_id]['qty'] += 1;
    } 
    else {
        // Add new product to cart
        $_SESSION['cart'][$product_id] = [
            'product_name'  => $product['product_name'],
            'product_price' => $product['product_price'],
            'product_image' => $product['product_image'],
            'qty'           => 1
        ];
    }
}

// ⭐ Redirect BACK to the page we came from
header("Location: " . $_SERVER['HTTP_REFERER']);
exit();
?>