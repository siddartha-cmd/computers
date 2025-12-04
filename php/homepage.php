<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buy Computers - Home</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="dark-bg">

<?php include 'navbar.php'; ?>



    <section class="hero-overlay">
    <div class="hero-content">
        <h1>Upgrade Your Home Office:<br> Best Laptops for Productivity in 2025</h1>
        <p>Looking for a high-quality laptop that meets all your computing needs? Our range offers the perfect blend of performance, style, and affordability.</p>
        <a href="products.php" class="shop-btn">SHOP NOW</a>
    </div>
</section>




    <!-- FEATURED PRODUCTS -->
    <section class="products-section">
    <h2 class="section-title">Top Picks</h2>

    <div class="product-grid">

        <!-- CARD 1 -->
        <div class="product-card">
            <img src="../img/macbook.png" alt="Laptop">
            <h3>MacBook Air M1 (2020)</h3>
            <p>$999</p>

            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="product_id" value="1">
                <button type="submit" class="product-btn">Add to Cart</button>
            </form>
        </div>

        <!-- CARD 2 -->
        <div class="product-card">
            <img src="../img/macbookpro.png" alt="Laptop">
            <h3>MacBook Pro 13-inch (M1)</h3>
            <p>$1299</p>

            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="product_id" value="2">
                <button type="submit" class="product-btn">Add to Cart</button>
            </form>
        </div>

        <!-- CARD 3 -->
        <div class="product-card">
            <img src="../img/macbookpro16.png" alt="Laptop">
            <h3>MacBook Pro 16-inch (2019)</h3>
            <p>$2399</p>

            <form action="add_to_cart.php" method="POST">
                <input type="hidden" name="product_id" value="3">
                <button type="submit" class="product-btn">Add to Cart</button>
            </form>
        </div>

    </div>
</section>



    <?php include '../includes/footer.php'; ?>

</body>
</html>