<?php
session_start();
$order_id = isset($_GET['order_id']) ? $_GET['order_id'] : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Order Success</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
    
    <style>
        body {
            background: rgba(0,0,0,0.4);
            font-family: Arial;
        }

        .success-popup {
            width: 420px;
            background: #fff;
            padding: 30px;
            text-align: center;
            border-radius: 15px;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .success-popup h1 {
            font-size: 26px;
            margin-bottom: 10px;
            color: #333;
        }

        .success-popup p {
            font-size: 18px;
            margin-bottom: 20px;
        }

        /* Checkmark animation */
        .checkmark {
            width: 80px;
            height: 80px;
            border-radius: 50%;
            display: inline-block;
            border: 4px solid #4CAF50;
            position: relative;
            margin-bottom: 20px;
        }

        .checkmark:after {
            content: '';
            position: absolute;
            left: 22px;
            top: 10px;
            width: 20px;
            height: 40px;
            border: solid #4CAF50;
            border-width: 0 6px 6px 0;
            transform: rotate(45deg);
        }

        .redirect-msg {
            margin-top: 15px;
            font-size: 15px;
            color: #555;
        }
    </style>

    <script>
        // Auto redirect after 3 seconds
        setTimeout(function() {
            window.location.href = "products.php";
        }, 3000);
    </script>
</head>
<body>

<?php include 'navbar.php'; ?>

<div class="success-popup">
    <div class="checkmark"></div>
    
    <h1>Order Successful!</h1>
    <p>Your order ID is <strong>#<?php echo $order_id; ?></strong></p>
    
    <p class="redirect-msg">Redirecting you to the products page...</p>
</div>

</body>
</html>