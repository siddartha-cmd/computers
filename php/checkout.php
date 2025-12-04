<?php
session_start();

// If cart empty, redirect
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: cart.php");
    exit();
}

// Calculate totals
$subtotal = 0;
foreach ($_SESSION['cart'] as $item) {
    $subtotal += $item['product_price'] * $item['qty'];
}

$delivery = 12.99;
$tax = round($subtotal * 0.13, 2);
$total = $subtotal + $delivery + $tax;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>

<body class="checkout-body">

<?php include 'navbar.php'; ?>

<div class="checkout-container">

    <!-- LEFT SIDE -->
   <!-- LEFT SIDE -->
<div class="checkout-left">

<!-- SHIPPING ADDRESS -->
<h2>Shipping Address</h2>

<div class="checkout-row">
    <input type="text" class="checkout-input" placeholder="First Name*">
    <input type="text" class="checkout-input" placeholder="Last Name*">
</div>

<div class="checkout-row">
    <input type="email" class="checkout-input" placeholder="Email*">
    <input type="text" class="checkout-input" placeholder="Phone Number*">
</div>

<div class="checkout-row">
    <input type="text" class="checkout-input" placeholder="City*">
    <input type="text" class="checkout-input" placeholder="State*">
</div>

<input type="text" class="checkout-input" placeholder="Zip Code*">

<textarea class="checkout-input textarea" placeholder="Enter a description..."></textarea>

<!-- SHIPPING METHOD -->


<!-- PAYMENT DETAILS -->
<h2>Payment Information</h2>

<div class="payment-icons">
    <img src="../img/payment/visa.png">
    <img src="../img/payment/mastercard.png">
    <img src="../img/payment/amex.png">
</div>

<input type="text" class="checkout-input" placeholder="Name on card">

<input type="text" class="checkout-input" placeholder="Card Number">

<div class="checkout-row">
    <input type="text" class="checkout-input" placeholder="MM/YY">
    <input type="text" class="checkout-input" placeholder="CVV">
</div>

<form action="place_order.php" method="POST">
    <button type="submit" class="confirm-btn">Place Order</button>
</form>

</div>

    <!-- RIGHT SIDE ORDER SUMMARY -->
    <div class="checkout-right">
        <h2>Order Summary</h2>

        <ul class="summary-list">
            <?php foreach ($_SESSION['cart'] as $item): ?>
                <li>
                    <span><?php echo $item['qty']; ?> × <?php echo $item['product_name']; ?></span>
                    <span>$<?php echo number_format($item['product_price'], 2); ?></span>
                </li>
            <?php endforeach; ?>

            <hr>

            <li><span>Subtotal</span><span>$<?php echo number_format($subtotal, 2); ?></span></li>
            <li><span>Delivery</span><span>$<?php echo number_format($delivery, 2); ?></span></li>
            <li><span>Tax</span><span>$<?php echo number_format($tax, 2); ?></span></li>

            <hr>

            <li class="total-row">
                <strong>Order Total</strong>
                <strong>$<?php echo number_format($total, 2); ?></strong>
            </li>
        </ul>

        <input type="text" placeholder="Coupon code" class="coupon-box">
        <button class="apply-btn">Apply</button>

    </div>

</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>