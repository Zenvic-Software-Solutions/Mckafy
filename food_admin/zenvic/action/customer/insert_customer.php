<?php
require '../../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = mysqli_real_escape_string($conn, $_POST['fname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $balance = isset($_POST['balance']) ? (float)$_POST['balance'] : 0;

    // Check if mobile number already exists
    $checkQuery = "SELECT id FROM customer_tbl WHERE mobile = '$mobile'";
    $checkResult = mysqli_query($conn, $checkQuery);
    
    if (mysqli_num_rows($checkResult) > 0) {
        echo json_encode(['status' => 'error', 'message' => 'Mobile number already exists!']);
        exit;
    }

    // Insert customer into database
    $query = "INSERT INTO customer_tbl (name, mobile, address, balance, STATUS) VALUES ('$name', '$mobile', '$address', '$balance', 'Active')";
    $result = mysqli_query($conn, $query);

    if ($result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to insert customer.']);
    }
}
?>
