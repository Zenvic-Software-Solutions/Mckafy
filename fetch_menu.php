<?php
include "food_admin/db/dbConnection.php";

$category = isset($_POST['category']) ? $_POST['category'] : 'Breakfast';

$sql = "SELECT * FROM food_tbl WHERE category = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $category);
$stmt->execute();
$result = $stmt->get_result();

$menuItems = [];
while ($row = $result->fetch_assoc()) {
    $menuItems[] = $row;
}

echo json_encode($menuItems);
?>
