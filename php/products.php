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

    <!-- ✅ Correct CSS path -->
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>

<body class="dark-bg">

<?php include 'navbar.php'; ?>

<section class="products-section">
    <h1 class="product-title">Our Products</h1>

    <div class="product-grid">
        <?php while($row = $result->fetch_assoc()) { ?>
            <div class="product-card">
                <img src="../img/products/<?php echo $row['product_image']; ?>" alt="Laptop Image">
                <h3><?php echo $row['product_name']; ?></h3>
                <p class="description"><?php echo $row['product_description']; ?></p>

                <p class="price">$<?php echo $row['product_price']; ?></p>
                <button class="product-btn">Add to Cart</button>
            </div>
        <?php } ?>
    </div>
</section>

<?php include '../includes/footer.php'; ?>

</body>
</html>
