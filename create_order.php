<?php
require 'food_admin/db/dbConnection.php'; 
require 'vendor/autoload.php'; 
use Razorpay\Api\Api;

$api = new Api("YOUR_RAZORPAY_KEY", "YOUR_RAZORPAY_SECRET");

$data = json_decode(file_get_contents("php://input"), true);
$user_id = $data['user_id'];
$cartItems = $data['cart']; // Array of food items

$totalAmount = 0;
foreach ($cartItems as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
}

$order = $api->order->create([
    'receipt' => uniqid(),
    'amount' => $totalAmount * 100, // Convert to paise
    'currency' => 'INR',
    'payment_capture' => 1
]);

$order_id = $order['id'];

// Insert Order into Database
mysqli_query($conn, "INSERT INTO food_orders (order_id, total_amount) VALUES ('$order_id', '$totalAmount')");

// Insert Ordered Items
foreach ($cartItems as $item) {
    mysqli_query($conn, "INSERT INTO food_order_items (order_id, food_id, quantity, price, subtotal) 
    VALUES ('$order_id', '{$item['id']}', '{$item['quantity']}', '{$item['price']}', '{$item['quantity'] * $item['price']}')");
}

echo json_encode(["order_id" => $order_id, "amount" => $totalAmount * 100, "currency" => "INR"]);
?>
