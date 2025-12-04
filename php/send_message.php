<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    // OPTIONAL — save message to database
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // If you have DB uncomment:
    /*
    $conn = new mysqli("localhost", "root", "", "computers");
    $stmt = $conn->prepare("INSERT INTO messages(name, email, message) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $message);
    $stmt->execute();
    */

    // Redirect to success page
    header("Location: message_success.php");
    exit();
}

// If accessed directly
header("Location: contact.php");
exit();
?>