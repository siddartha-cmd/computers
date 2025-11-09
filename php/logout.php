<?php
session_start();
session_unset();   // remove all session variables
session_destroy(); // destroy session

// redirect to login page or home page
header("Location: login.php");
exit();
?>
