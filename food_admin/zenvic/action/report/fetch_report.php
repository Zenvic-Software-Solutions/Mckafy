<?php
require '../../../db/dbConnection.php';

$request = $_POST;


// Base query
$sql = "SELECT 
            a.created_at as date, 
            b.name AS customer_name, 
            b.mobile, 
            a.paid_amount, 
            b.balance 
        FROM `bill_tbl` AS a 
        LEFT JOIN customer_tbl AS b ON a.customer_id = b.id 
        WHERE a.status = 'Active'";

// Apply date filter
if (!empty($request['from_date']) && !empty($request['to_date'])) {
    $from_date = mysqli_real_escape_string($conn, $request['from_date']);
    $to_date = mysqli_real_escape_string($conn, $request['to_date']);
    $sql .= " AND a.created_at BETWEEN '$from_date' AND '$to_date'";
}

// Apply customer filter
if (!empty($request['customer_id'])) {
    $customer_id = mysqli_real_escape_string($conn, $request['customer_id']);
    $sql .= " AND b.id = '$customer_id'";
}



// Pagination
$limit = $request['length'];
$start = $request['start'];
$sql .= " LIMIT $start, $limit";

// Fetch data
$result = mysqli_query($conn, $sql);
$data = [];
$i = $start + 1;

while ($row = mysqli_fetch_assoc($result)) {
    $formatted_date = date("d-M-Y", strtotime($row['date'])); // Format: DD-MM-YYYY
    $data[] = [
        "serial_no" => $i++,
        "date" => $formatted_date,  // Use formatted date
        "customer_name" => $row['customer_name'],
        "mobile" => $row['mobile'],
        "paid_amount" => $row['paid_amount'],
        "balance" => $row['balance'],
       
    ];
}

// Total records count
$totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM bill_tbl AS a 
                                          LEFT JOIN customer_tbl AS c ON a.customer_id = c.id 
                                          WHERE a.status = 'Active'");
$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];

// Response JSON
$response = [
    "draw" => intval($request['draw']),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $totalRecords,
    "data" => $data
];

echo json_encode($response);
?>
