<?php
require '../../../db/dbConnection.php'; // Ensure database connection is established

if (isset($_POST['empId'])) {
    $id = mysqli_real_escape_string($conn, $_POST['empId']);
    $query = "SELECT id,food_name,food_type,category,price ,food_image FROM food_tbl WHERE id = '$id'";
    $result = mysqli_query($conn, $query);

    if ($row = mysqli_fetch_assoc($result)) {
        echo json_encode($row);
    } else {
        echo json_encode(["error" => "No record found"]);
    }
}
?>
