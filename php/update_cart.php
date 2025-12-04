<?php
session_start();

if (isset($_POST['product_id'], $_POST['action'])) {

    $id = $_POST['product_id'];

    if ($_POST['action'] == "increase") {
        $_SESSION['cart'][$id]['qty']++;
    }

    if ($_POST['action'] == "decrease" && $_SESSION['cart'][$id]['qty'] > 1) {
        $_SESSION['cart'][$id]['qty']--;
    }
}

header("Location: cart.php");
exit();
?>