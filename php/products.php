<?php
session_start();

$conn = new mysqli("localhost", "root", "", "computers");
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM product";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Products</title>

    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>

<body>

<?php include 'navbar.php'; ?>

<section class="products-section">
    <h1 class="product-title">Our Products</h1>

    <div class="product-grid">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="product-card">

                <!-- ✅ Product Image -->
                <img src="../img/products/<?php echo $row['product_image']; ?>" alt="Product Image">

                <!-- ✅ Product Name -->
                <h3><?php echo $row['product_name']; ?></h3>

                <!-- ✅ Product Description -->
                <p class="description"><?php echo $row['product_description']; ?></p>

                <!-- ✅ Product Price -->
                <p class="price">$<?php echo $row['product_price']; ?></p>

                <!-- ✅ Add to Cart Form -->
                <form action="add_to_cart.php" method="POST">
    <input type="hidden" name="product_id" value="<?php echo $row['product_id']; ?>">
    <button type="submit" class="product-btn">Add to Cart</button>
</form>


            </div>
        <?php } ?>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

</body>
</html>
