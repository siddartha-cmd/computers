<?php
session_start();


$cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : [];
$totalAmount = 0;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Your Cart</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="cart-page">
    <div class="cart-container">

        <h2 class="cart-title">Shopping Cart</h2>

        <?php if (empty($cart)): ?>
            <p class="empty-cart">Your cart is empty.</p>
            <a href="products.php" class="continue-shopping-btn">Continue Shopping</a>

        <?php else: ?>

            <?php foreach ($cart as $id => $item): 
                $subtotal = $item['product_price'] * $item['qty'];
                $totalAmount += $subtotal;
            ?>

<div class="cart-item">

<!-- Big Product Image -->
<img src="../img/products/<?php echo $item['product_image']; ?>" class="cart-item-img">

<!-- Product Info -->
<div class="cart-item-info">
    <h3 class="cart-item-name"><?php echo $item['product_name']; ?></h3>
    <p class="item-price">$<?php echo $item['product_price']; ?></p>

    <!-- Qty Controls -->
    <div class="quantity-box">
        <form action="update_cart.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
            <button type="submit" name="action" value="decrease" class="qty-btn">-</button>
        </form>

        <span class="qty-number"><?php echo $item['qty']; ?></span>

        <form action="update_cart.php" method="POST">
            <input type="hidden" name="product_id" value="<?php echo $id; ?>">
            <button type="submit" name="action" value="increase" class="qty-btn">+</button>
        </form>
    </div>
</div>

<!-- Remove + Subtotal -->
<div class="remove-box">
    <p class="item-total">$<?php echo $item['product_price'] * $item['qty']; ?></p>
    <form action="remove_cart.php" method="POST">
        <input type="hidden" name="product_id" value="<?php echo $id; ?>">
        <button class="remove-btn">Remove</button>
    </form>
</div>

</div>

<hr class="divider">

            <?php endforeach; ?>

            <div class="final-total">
                <span>Total:</span>
                <strong>$<?php echo $totalAmount; ?></strong>
            </div>

            <div class="cart-buttons">
    <a href="products.php" class="continue-shopping-btn">Continue Shopping</a>
    <?php if (isset($_SESSION['user_id'])): ?>
    <a href="checkout.php" class="checkout-btn">Checkout</a>
<?php else: ?>
    <a href="login.php" class="checkout-btn">Login to Checkout</a>
<?php endif; ?>
</div>

        <?php endif; ?>

    </div>
</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>