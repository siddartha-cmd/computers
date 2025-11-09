<?php
session_start();

// DB Connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "computers";

$conn = new mysqli($servername, $username, $password, $dbname);

// If connection fails
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$error = "";
$success = "";

// When form submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $name = $_POST['user_name'];
    $pass = $_POST['user_password'];
    $confirm = $_POST['confirm_password'];
    $email = $_POST['email'];

    // Check passwords match
    if ($pass != $confirm) {
        $error = "Passwords do not match!";
    } else {

        // Check if username exists
        $checkUser = "SELECT * FROM user WHERE user_name = '$name'";
        $result = $conn->query($checkUser);

        if ($result->num_rows > 0) {
            $error = "Username already exists!";
        } else {
            // Hash the password (more secure than MD5)
            $hashed = md5($pass);

            // Insert user
            $insert = "INSERT INTO user (user_name, user_password, email, user_role)
                       VALUES ('$name', '$hashed', '$email', 'user')";

            if ($conn->query($insert)) {
                // Success → redirect to login
                header("Location: login.php?signup=success");
                exit();
            } else {
                $error = "Something went wrong. Try again.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>

    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="login-bg">

<div class="login-wrapper">

    <!-- LEFT SIDE VIDEO / IMAGE (same style as login) -->
    <div class="login-left">
        <video autoplay muted loop playsinline class="login-video">
            <source src="../videos/login.mp4" type="video/mp4">
        </video>
    </div>

    <!-- RIGHT FORM -->
    <div class="login-right">
        <div class="login-box">
            <h2>Create Account</h2>
            <p class="login-sub">Register to start shopping</p>

            <?php if($error) { echo "<p class='error-msg'>$error</p>"; } ?>

            <form action="signup.php" method="POST">

                <input type="text" name="user_name" placeholder="Username" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="password" name="user_password" placeholder="Password" required>
                <input type="password" name="confirm_password" placeholder="Confirm Password" required>

                <button type="submit" class="login-btn-orange">Register</button>

                <p class="signup-text">
                    Already have an account?
                    <a href="login.php">Login</a>
                </p>

            </form>
        </div>
    </div>

</div>

</body>
</html>
