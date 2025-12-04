<?php
session_start();

// User must be logged in
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

$conn = new mysqli("localhost", "root", "", "computers");
if ($conn->connect_error) {
    die("DB Error: " . $conn->connect_error);
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM orders WHERE user_id = $user_id ORDER BY order_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>My Orders</title>
    <link rel="stylesheet" href="../css/style.css?v=<?php echo time(); ?>">
</head>

<body>

<?php include 'navbar.php'; ?>

<div class="orders-container">

    <h1>My Orders</h1>

    <?php if ($result->num_rows == 0): ?>
        <p>You have no past orders.</p>
    <?php else: ?>

    <table class="orders-table">
        <tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Total</th>
            <th>View</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>#<?php echo $row['order_id']; ?></td>
                <td><?php echo $row['order_date']; ?></td>
                <td>$<?php echo $row['total_amount']; ?></td>
                <td>
                    <a href="order_details.php?order_id=<?php echo $row['order_id']; ?>" class="order-btn">
                        View Details
                    </a>
                </td>
            </tr>
        <?php } ?>
    </table>

    <?php endif; ?>

</div>

<?php include '../includes/footer.php'; ?>

</body>
</html>