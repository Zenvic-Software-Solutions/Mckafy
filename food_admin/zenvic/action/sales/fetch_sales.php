<?php
require '../../../db/dbConnection.php'; // Ensure database connection is established

$request = $_POST;
$search = ""; // Initialize variable to avoid undefined error

// Define table columns
$columns = ['a.id', 'c.name', 'c.mobile', 'a.total_amount', 'c.balance'];


// Base query
$sql = "SELECT
            a.id as bill_id,
            a.total_amount,
            c.name,
            c.mobile,
            c.balance
        FROM
            `bill_tbl` AS a
        LEFT JOIN customer_tbl AS c
        ON
            a.customer_id = c.id
        WHERE
            a.status = 'Active'";

// Search filter
if (!empty($request['search']['value'])) {
    $search = mysqli_real_escape_string($conn, $request['search']['value']);
    $sql .= " AND (c.name LIKE '%$search%' OR c.mobile LIKE '%$search%')";
}

// Sorting
$columnIndex = $request['order'][0]['column']; // Column index
$columnName = $columns[$columnIndex]; // Column name
$columnSortOrder = $request['order'][0]['dir']; // asc/desc
$sql .= " ORDER BY $columnName $columnSortOrder";

// Pagination
$limit = $request['length'];
$start = $request['start'];
$sql .= " LIMIT $start, $limit";

// Fetch data
$result = mysqli_query($conn, $sql);
$data = [];
$i = $start + 1;

while ($row = mysqli_fetch_assoc($result)) {
    $data[] = [
        "serial_no" => $i++,
        "id" => $row['bill_id'],
        "name" => $row['name'],
        "mobile" => $row['mobile'],
        "total_amount" => $row['total_amount'],
        "balance" => $row['balance'],
        "action" => '
             <button class="btn btn-sm text-success viewBill" data-id="' . $row['bill_id'] . '">
            <i class="lni lni-eye"></i>
            </button>
            <button class="btn btn-sm text-danger" onclick="goDeleteEmployee(' . $row['bill_id'] . ');"><i class="lni lni-trash"></i></button>
            <a href="generate_invoice.php?get_id='.$row['bill_id'].'" target="_blank"><button class="btn btn-primary btn-sm invoiceBtn"><i class="fadeIn animated bx bx-cloud-download"></i>Invoice</button></a>'
    ];
}

// Total records count
$totalRecordsQuery = mysqli_query($conn, "SELECT COUNT(*) AS total FROM bill_tbl WHERE status = 'Active'");
$totalRecords = mysqli_fetch_assoc($totalRecordsQuery)['total'];

$filteredRecordsQuery = mysqli_query($conn, "SELECT
            COUNT(*) AS total
        FROM
            `bill_tbl` AS a
        LEFT JOIN customer_tbl AS c
        ON
            a.customer_id = c.id
        WHERE
            a.status = 'Active' AND (c.name LIKE '%$search%' OR c.mobile LIKE '%$search%')");

$filteredRecords = mysqli_fetch_assoc($filteredRecordsQuery)['total'];


// Response JSON
$response = [
    "draw" => intval($request['draw']),
    "recordsTotal" => $totalRecords,
    "recordsFiltered" => $filteredRecords, // Adjust if search filter is applied
    "data" => $data
];

echo json_encode($response);
?>
