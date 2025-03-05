<?php
require '../../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = mysqli_real_escape_string($conn, $_POST['edit_id']);
    $name = mysqli_real_escape_string($conn, $_POST['edit_fname']);
    $mobile = mysqli_real_escape_string($conn, $_POST['edit_mobile']);
    $address = mysqli_real_escape_string($conn, $_POST['edit_address']);
    $balance = isset($_POST['edit_balance']) ? (float)$_POST['edit_balance'] : 0;

    // Check if mobile number already exists (except for the current user)
    $checkQuery = "SELECT id FROM customer_tbl WHERE mobile = '$mobile' AND id != '$id'";
    $checkResult = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($checkResult) > 0) {
        echo json_encode(["status" => "error", "message" => "Mobile number already in use!"]);
        exit;
    }

    $query = "UPDATE customer_tbl SET name = '$name', mobile = '$mobile', address = '$address', balance = '$balance' WHERE id = '$id'";
    if (mysqli_query($conn, $query)) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Update failed"]);
    }
}
?>
