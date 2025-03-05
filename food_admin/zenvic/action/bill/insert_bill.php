<?php
require '../../../db/dbConnection.php'; // Ensure database connection is established

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $customer_id = $_POST['customer_id'] ?? '';
    $customer_name = $_POST['customer_name'] ?? '';
    $mobile = $_POST['mobile'] ?? '';
    $address = $_POST['address'] ?? '';
    $balance = $_POST['balance'] ?? 0;
    $rent = $_POST['rent'] ?? 0;
    $discount = $_POST['discount'] ?? 0;
    $out_box = $_POST['out_box'] ?? 0;
    $return_box = $_POST['return_box'] ?? 0;
    $paid_amount = $_POST['paid_amount'] ?? 0;
    $total_amount = $_POST['total_amount'] ?? 0;
    $products = $_POST['products'] ?? [];

    // Start transaction
    mysqli_begin_transaction($conn);

    try {
        // Insert new customer if ID is not provided
        if (empty($customer_id)) {
            $query = "INSERT INTO customer_tbl (name, mobile, address, balance) VALUES ('$customer_name', '$mobile', '$address', '$balance')";
            mysqli_query($conn, $query);
            $customer_id = mysqli_insert_id($conn);
        }

        // Insert bill record
        $query = "INSERT INTO bill_tbl (customer_id, rent, paid_amount, discount, out_box, return_box,total_amount) 
        VALUES ('$customer_id', '$rent', '$paid_amount', '$discount', '$out_box', '$return_box', '$total_amount')";
        mysqli_query($conn, $query);
        $bill_id = mysqli_insert_id($conn);

        // Insert bill products
        foreach ($products as $product) {
            $product_id = $product['productId'];
            $quantity = $product['qty'];
            $price = $product['price'];
            $total = $product['total'];

            $query = "INSERT INTO bill_item_tbl (bill_id, product_id, quantity, price ,total) 
            VALUES ('$bill_id', '$product_id', '$quantity', '$price','$total')";
            mysqli_query($conn, $query);
        }

        // Commit transaction
        mysqli_commit($conn);
        echo json_encode(["success" => true, "message" => "Bill inserted successfully."]);
    } catch (Exception $e) {
        mysqli_rollback($conn);
        echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
    }
}
?>
