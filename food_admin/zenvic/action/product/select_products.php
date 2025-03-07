<?php

require '../../../db/dbConnection.php'; // Ensure database connection is established




$search = isset($_GET['q']) ? $_GET['q'] : ''; // Get the search term

$query = "SELECT id, product_name FROM product_tbl WHERE product_name LIKE ? LIMIT 10"; // Search query with LIMIT
$stmt = $conn->prepare($query);
$searchTerm = "%$search%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$customers = [];
while ($row = $result->fetch_assoc()) {
    $customers[] = [
        "id" => $row['id'], 
        "text" => $row['product_name']  // 'text' is required for Select2
    ];
}

echo json_encode(["results" => $customers]); // Send as JSON
?>