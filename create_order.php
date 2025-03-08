<?php
require 'food_admin/db/dbConnection.php';
require 'vendor/autoload.php';
require 'send_mail.php';
use Razorpay\Api\Api;
$order_id='';
$api = new Api("rzp_test_g0Q9C1u01IFEEX", "QpKr2VMFDbFPbVZhhLtFhyqQ");

$data = json_decode(file_get_contents("php://input"), true);
$user_name = $data['user_name'];
$user_email = $data['user_email'];
$user_phone = $data['user_phone'];
$cartItems = $data['cart'];

$totalAmount = 0;
foreach ($cartItems as $item) {
    $totalAmount += $item['price'] * $item['quantity'];
}

$order = $api->order->create([
    'receipt' => uniqid(),
    'amount' => $totalAmount * 100,
    'currency' => 'INR',
    'payment_capture' => 1
]);



$order_id = $order->id;

// Insert order into database
$orderQuery = "INSERT INTO food_orders (order_id, user_name, user_email, user_phone, total_amount) VALUES ('$order_id', '$user_name', '$user_email', '$user_phone', '$totalAmount')";
if (!mysqli_query($conn, $orderQuery)) {
    die(json_encode(["error" => "SQL Error: " . mysqli_error($conn)]));
}

// Insert order items
foreach ($cartItems as $item) {
    $food_id = mysqli_real_escape_string($conn, $item['id']);
    $quantity = (int) $item['quantity'];
    $price = (float) $item['price'];
    $subtotal = $quantity * $price;

    $query = "INSERT INTO food_order_items (order_id, food_id, quantity, price, subtotal) 
              VALUES ('$order_id', '$food_id', '$quantity', '$price', '$subtotal')";
    
   
    if (!mysqli_query($conn, $query)) { // Remove 'mysql:' from here
        die(json_encode(["error" => "SQL Error: " . mysqli_error($conn)]));
    }
    
    // Get the last inserted ID
    $last_inserted_id = mysqli_insert_id($conn);
    
}

 // Call the sendRegistrationMail function
//  $sendMail = sendRegistrationMail($user_email, $user_name, $user_phone,$last_inserted_id, $order_id ,$cartItems);
 $sendMail = sendRegistrationMail($user_email, $user_name, $user_phone, $last_inserted_id, $order_id, $cartItems, 12);






echo json_encode(["order_id" => $order_id, "amount" => $totalAmount * 100, "currency" => "INR"]);
exit;


?>
