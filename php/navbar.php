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
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <!-- NAVBAR -->
    <header class="navbar">
        <div class="logo">BuyComputers</div>

        <ul class="nav-links">
            <li><a href="homepage.php">Home</a></li>
            <li><a href="about.php">About</a></li>
            <li><a href="products.php">Products</a></li>
           
            <li><a href="contact.php">Contact</a></li>
            <li>
            <a href="cart.php" class="cart-link">
                <i class="fa-solid fa-cart-shopping"></i>
                <span class="cart-count">
                    <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                </span>
            </a>
        </li>
        <li><a href="my_orders.php">My Orders</a></li>
        </ul>

        <div class="nav-actions">
            <input type="text" class="search-bar" placeholder="Search...">

            <?php if(isset($_SESSION['user_name'])) { ?>
    <span class="nav-user">Welcome, <?php echo $_SESSION['user_name']; ?></span>
    <a href="../php/logout.php" class="login-btn">Logout</a>
<?php } else { ?>
    <a href="../php/login.php" class="login-btn">Login</a>
<?php } ?>

        </div>
    </header>