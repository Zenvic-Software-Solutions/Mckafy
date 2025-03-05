<?php
require 'food_admin/db/dbConnection.php'; 
require 'vendor/autoload.php'; 
use Razorpay\Api\Api;

$api = new Api("rzp_test_g0Q9C1u01IFEEX", "QpKr2VMFDbFPbVZhhLtFhyqQ");

$data = json_decode(file_get_contents("php://input"), true);
$razorpay_payment_id = $data['razorpay_payment_id'];
$order_id = $data['order_id'];

// Fetch order details
$orderQuery = mysqli_query($conn, "SELECT total_amount FROM food_orders WHERE order_id = '$order_id'");
$orderRow = mysqli_fetch_assoc($orderQuery);
$totalAmount = $orderRow['total_amount'] * 100;

try {
    $payment = $api->payment->fetch($razorpay_payment_id);
    
    if ($payment->status == "captured") {
        // Update payment status
        mysqli_query($conn, "UPDATE food_orders SET payment_status = 'Paid' WHERE order_id = '$order_id'");

        echo json_encode(["status" => "success", "message" => "Payment Successful!"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Payment failed!"]);
    }
} catch (Exception $e) {
    echo json_encode(["status" => "error", "message" => $e->getMessage()]);
}
?>
