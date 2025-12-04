<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Message Sent</title>
    <meta http-equiv="refresh" content="3;url=homepage.php"> 
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
        }

        .success-box {
            background: #f5f5f5;
            padding: 40px;
            border-radius: 15px;
            box-shadow: 0 4px 20px rgba(0,0,0,0.1);
        }

        h1 {
            color: #4CAF50;
            margin-bottom: 10px;
        }

        p {
            color: #444;
        }
    </style>
</head>
<body>

<div class="success-box">
    <h1>✔ Message Sent Successfully!</h1>
    <p>You will be redirected to the homepage in 3 seconds...</p>
</div>

</body>
</html>