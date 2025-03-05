<?php
require_once('../TCPDF/tcpdf.php');
require_once('../db/dbConnection.php'); // Include your database connection file

// Get selected date from request
$get_id = isset($_GET['get_id']);


$query_bill = "SELECT
                a.id as bill_id,
                b.name,
                b.mobile,
                b.address,
                b.balance,
                a.rent,
                a.paid_amount,
                a.discount,
                a.out_box,
                a.return_box,
                a.total_amount,
                a.created_at
            FROM
                `bill_tbl` AS a
            LEFT JOIN customer_tbl AS b
            ON
                a.customer_id = b.id
            WHERE
                a.id = '$get_id'";
$result_bill = $conn->query($query_bill);
$bill_details = $result_bill->fetch_assoc();

    $id = $bill_details['bill_id'];
    $name = $bill_details['name'];
    $mobile = $bill_details['mobile'];
    $address = $bill_details['address'];
    $balance = $bill_details['balance'];
    $rent = $bill_details['rent'];
    $paid_amount = $bill_details['paid_amount'];
    $discount = $bill_details['discount'];
    $out_box = $bill_details['out_box'];
    $return_box = $bill_details['return_box'];
    $total_amount = $bill_details['total_amount'];
    $date = date("d-M-Y", strtotime($bill_details['created_at']));
   

// Fetch product details
$query_products = "SELECT
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
                bill_id = '$id'";
$result_products = $conn->query($query_products);


// $product_name = $product_row['product_name'];
// $product_name = $product_row['product_name'];

// Create PDF
class PDF extends TCPDF {
    public function Header() {
        $this->SetFont('helvetica', 'B', 16);
        $this->SetFillColor(216, 27, 96);
        $this->SetTextColor(255, 255, 255);
        $this->Cell(0, 15, 'SALES INVOICE', 0, 1, 'C', true);
    }

    public function Footer() {
        $this->SetY(-20);
        $this->SetFont('helvetica', 'I', 10);
        $this->Cell(0, 10, 'Thank you for your business!', 0, 0, 'C');
    }
}

$pdf = new PDF('P', 'mm', 'A4', true, 'UTF-8', false);
$pdf->SetMargins(10, 20, 10);
$pdf->AddPage();
$pdf->SetFont('helvetica', '', 11);

$html = '
<style>
    .company-info { font-size: 14px; font-weight: bold; text-align: center; color: #222; }
    .customer-info { font-size: 14px; color: #222; }
    .bold { font-weight: bold; }
    .table-header { background-color: #d81b60; color: white; font-weight: bold; text-align: center; }
    .table-data { text-align: center; }
    .total-row { background-color: #f8d7da; font-weight: bold; }
    .summary-table th { background-color: #343a40; color: white; font-weight: bold; text-align: center; }
</style>';

$html .= '
<table border="0" cellpadding="6" width="100%">
    <tr>
    <td class="customer-info">
            <b>Invoice No:</b> 00' . $id . '<br>
            <b>Date:</b> ' . $date . '<br>
            <b>Customer:</b> ' . $name . '<br>
            <b>Location:</b> ' . $address . '
        </td>
        <td align="right" class="company-info">
            <b>ACK FISHERIES</b><br>
            #11, 12, New Fish Market, Vellore, TamilNadu<br>
            <b>Cell:</b> 9443340112 / 9600896028
        </td>
        
    </tr>
</table>
<br><br>

<table border="1" cellspacing="0" cellpadding="6" width="100%">
    <tr class="table-header">
        <th width="10%"><b>S.No</b></th>
        <th width="30%"><b>Product Name</b></th>
        <th width="15%"><b>Qty</b></th>
        <th width="15%"><b>Rate</b></th>
        <th width="30%"><b>Amount</b></th>
    </tr>';

$total_amount = 0;
$sno = 1;
while ($row = $result_products->fetch_assoc()) {
    $product_name = $row['product_name'];
    $quantity = $row['quantity'];
    $price = $row['price'];
    $total = $row['total'];
    $total_amount += $row['amount'];
    $html .= '<tr class="table-data">
                <td align="center">' . $sno++ . '</td>
                <td>' . $product_name . '</td>
                <td align="center">' . $quantity . '</td>
                <td align="center">' . number_format($price, 2) . '</td>
                <td align="center">' . number_format($total, 2) . '</td>
            </tr>';
}

        for($i=1;$i<6;$i++){

            $html .= '<tr class="table-data">
            <td align="center"> </td>
            <td></td>
            <td align="center"></td>
            <td align="center"></td>
            <td align="center"></td>
        </tr>';

        }

$html .= '<tr class="total-row">
            <td colspan="4" align="right">TOTAL</td>
            <td align="center">' . number_format($total_amount, 2) . '</td>
        </tr>
</table>';

$html .= '<table border="1" cellspacing="0" cellpadding="6" class="summary-table" style="margin-top: 10px;">
    <tr>
        <th width="33%"><b>Grand Total</b></th>
        <th width="33%"><b>Paid Amount</b></th>
        <th width="34%"><b>Total Balance</b></th>
    </tr>
    <tr class="table-data">
        <td align="center">122600.00</td>
        <td align="center">20000.00</td>
        <td align="center">102600.00</td>
    </tr>
</table>';

$pdf->writeHTML($html, true, false, true, false, '');
ob_end_clean(); // Prevent unwanted output
$pdf->Output('sales_invoice.pdf', 'I');

?>
