<?php

require '../../../db/dbConnection.php'; // Database connection

$search = isset($_GET['q']) ? $_GET['q'] : ''; // Get the search term

$query = "SELECT id, name FROM customer_tbl WHERE name LIKE ? LIMIT 10"; // Search query with LIMIT
$stmt = $conn->prepare($query);
$searchTerm = "%$search%";
$stmt->bind_param("s", $searchTerm);
$stmt->execute();
$result = $stmt->get_result();

$customers = [];
while ($row = $result->fetch_assoc()) {
    $customers[] = [
        "id" => $row['id'], 
        "text" => $row['name']  // 'text' is required for Select2
    ];
}

echo json_encode(["results" => $customers]); // Send as JSON
?>