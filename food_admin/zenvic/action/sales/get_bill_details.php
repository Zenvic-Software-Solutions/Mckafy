<?php
require '../../../db/dbConnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['bill_id'])) {
    $bill_id = intval($_POST['bill_id']);

    // Fetch Customer Details
    $customerQuery = mysqli_query($conn, "SELECT c.name, c.mobile, c.balance , c.address
                                           FROM bill_tbl AS b 
                                           LEFT JOIN customer_tbl AS c ON b.customer_id = c.id 
                                           WHERE b.id = $bill_id");
    $customer = mysqli_fetch_assoc($customerQuery);

    // Fetch Product Details
    $productQuery = mysqli_query($conn, "SELECT
                            b.product_name,
                            a.quantity,
                            a.price,
                            a.total
                        FROM
                            `bill_item_tbl` AS a
                        LEFT JOIN product_tbl AS b
                        ON
                            a.product_id = b.id
                        WHERE
                            a.bill_id = $bill_id");

    $products = [];
    while ($row = mysqli_fetch_assoc($productQuery)) {
        $products[] = $row;
    }

    echo json_encode([
        "status" => "success",
        "customer" => $customer,
        "products" => $products
    ]);
} else {
    echo json_encode(["status" => "error"]);
}
?>
