<?php
require 'food_admin/db/dbConnection.php';

if (!isset($_GET['order_id'])) {
    die("Invalid request.");
}

$order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
$statusMessage = "";
$alertClass = "";

// Check if the payment was successful or failed
if (isset($_GET['payment_status']) && $_GET['payment_status'] == 'success') {
    $updateQuery = "UPDATE food_orders SET status='Paid' WHERE order_id='$order_id'";
    if (mysqli_query($conn, $updateQuery)) {
        $statusMessage = "Payment Successful! Your order has been placed successfully.";
        $alertClass = "alert-success";
    } else {
        $statusMessage = "Error updating order status.";
        $alertClass = "alert-danger";
    }
} elseif (isset($_GET['payment_status']) && $_GET['payment_status'] == 'failed') {
    $updateQuery = "UPDATE food_orders SET status='Failed' WHERE order_id='$order_id'";
    if (mysqli_query($conn, $updateQuery)) {
        $statusMessage = "Payment Failed! Sorry, the payment process has failed. Please try again.";
        $alertClass = "alert-danger";
    } else {
        $statusMessage = "Error updating order status to 'Failed'.";
        $alertClass = "alert-danger";
    }
} else {
    $statusMessage = "Invalid payment status.";
    $alertClass = "alert-warning";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Status</title>
    
    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f8f9fa;
        }
        .status-container {
            text-align: center;
            padding: 30px;
            border-radius: 10px;
            background: #fff;
            box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }
        .btn-custom {
            padding: 10px 20px;
            font-size: 18px;
        }
    </style>
</head>
<body>

    <div class="status-container">
        <div class="alert <?php echo $alertClass; ?>" role="alert">
            <h4 class="alert-heading"><?php echo $statusMessage; ?></h4>
        </div>
        <a href="index.php" class="btn btn-primary btn-custom">Go to Home</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
