<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computers";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_name = $_POST['user_name'];
    $user_password = md5($_POST['user_password']);

    $sql = "SELECT * FROM user WHERE user_name = '$user_name' AND user_password = '$user_password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
        $_SESSION['user_id'] = $user['user_id'];
        $_SESSION['user_name'] = $user['user_name'];
        $_SESSION['user_role'] = $user['user_role'];

        if ($user['user_role'] == 'admin') {
            header("Location: admin_product_list.php");
            exit();
        } else {
            header("Location: homepage.php");
            exit();
        }
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="../css/style.css">
</head>
<body class="login-bg">
<?php include 'navbar.php'; ?>

<div class="login-wrapper">

    <!-- LEFT SIDE IMAGE -->
    <div class="login-left">
    <video autoplay muted loop playsinline class="login-video">
        <source src="../videos/login.mp4" type="video/mp4">
    </video>
</div>


    <!-- RIGHT SIDE FORM -->
    <div class="login-right">
        <div class="login-box">
            <h2>Welcome Back!</h2>
            <p class="login-sub">Log in to explore new products and offers</p>

            <?php if(!empty($error)) { echo "<p class='error-msg'>$error</p>"; } ?>

            <form method="POST" action="login.php">

                <input type="text" name="user_name" placeholder="Enter your username" required>

                <input type="password" name="user_password" placeholder="Enter your password" required>

                <div class="login-options">
                    <label><input type="checkbox"> Remember me</label>
                    <a href="#" class="forgot-link">Forgot Password?</a>
                </div>

                <button type="submit" class="login-btn-orange">Login</button>

                <p class="signup-text">
                    Don't have an account?
                    <a href="signup.php">Register Now</a>
                </p>

            </form>
        </div>
    </div>
</div>
<?php include '../includes/footer.php'; ?>

</body>
</html>
