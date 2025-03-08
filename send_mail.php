<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Include PHPMailer
require 'food_admin/fpdf/fpdf.php'; // Include FPDF

function generatePDF($toEmail, $toName, $toPhone, $userID, $order_id, $products, $gstRate) {

    class BillPDF extends FPDF {
        private $order_id; // Declare a property to store order ID

        function __construct($order_id) {
            parent::__construct();
            $this->order_id = $order_id; // Store order ID in the class
        }
        function Header() {
            // Add Logo
            $this->Image('assets/img/logo2.png', 10, 6, 30); // Adjust path and size
        
            // Move to the right
            $this->SetY(10);
            $this->SetFont('Arial', 'B', 14);
            $this->Cell(0, 10, 'MERZ CAFE BILL', 0, 1, 'C');
        
            $this->SetFont('Arial', '', 10);
            $this->Cell(0, 6, "Order ID: " . $this->order_id, 0, 1, 'C'); // Ensure order_id is set correctly
            $this->Cell(0, 6, "Date: " . date("d-m-Y H:i"), 0, 1, 'C');
            $this->Ln(5);
        }
        function Footer() {
            $this->SetY(-20);
            $this->SetFont('Arial', 'I', 10);
            $this->Cell(0, 5, 'Thank you for your purchase!', 0, 1, 'C');
            $this->Cell(0, 5, 'Contact: +91 98765 43210 | Email: support@example.com', 0, 1, 'C');
        }
    }

    // Create PDF object with order ID
    $pdf = new BillPDF($order_id);
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);
    
    // Customer Details
    $pdf->Cell(0, 8, "Name: $toName", 0, 1);
    $pdf->Cell(0, 8, "Phone: $toPhone", 0, 1);
    $pdf->Cell(0, 8, "Email: $toEmail", 0, 1);
    $pdf->Ln(5);

    // Table Header
    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(90, 7, "Item", 1);
    $pdf->Cell(20, 7, "Qty", 1, 0, 'C');
    $pdf->Cell(30, 7, "Price", 1, 0, 'C');
    $pdf->Cell(40, 7, "Total", 1, 1, 'C');

    $pdf->SetFont('Arial', '', 10);
    $subtotal = 0;
    
    foreach ($products as $product) {
        $item = substr($product['name'], 0, 30);
        $qty = $product['quantity'];
        $price = number_format($product['price'], 2);
        $total = number_format($qty * $product['price'], 2);
        $subtotal += $qty * $product['price'];
        
        $pdf->Cell(90, 7, $item, 1);
        $pdf->Cell(20, 7, $qty, 1, 0, 'C');
        $pdf->Cell(30, 7, $price, 1, 0, 'C');
        $pdf->Cell(40, 7, $total, 1, 1, 'C');
    }

    // GST Calculation
    $gstAmount = ($subtotal * $gstRate) / 100;
    $grandTotal = $subtotal + $gstAmount;

    $pdf->SetFont('Arial', 'B', 10);
    $pdf->Cell(140, 7, "Subtotal", 1, 0, 'R');
    $pdf->Cell(40, 7, number_format($subtotal, 2), 1, 1, 'C');

    $pdf->Cell(140, 7, "GST ($gstRate%)", 1, 0, 'R');
    $pdf->Cell(40, 7, number_format($gstAmount, 2), 1, 1, 'C');

    $pdf->Cell(140, 7, "Grand Total", 1, 0, 'R');
    $pdf->Cell(40, 7, number_format($grandTotal, 2), 1, 1, 'C');
    
    // Save and Output PDF
    $filePath = "pdfs/user_{$userID}_bill.pdf";
    $pdf->Output($filePath, 'F');
    return $filePath;
}


function sendRegistrationMail($toEmail, $toName, $toPhone, $userID, $order_id, $products, $gstRate) {
    $pdfFile = generatePDF($toEmail, $toName, $toPhone, $userID, $order_id, $products, $gstRate); // Create PDF
    
    $mail = new PHPMailer(true);

    try {
        // SMTP Configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'webdevvasanth@gmail.com';
        $mail->Password   = 'wsrc abtn dxwc fuqf'; // Use App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        // Sender & Recipient
        $mail->setFrom('webdevvasanth@gmail.com', 'https://merzcafe.com/');
        $mail->addAddress($toEmail, $toName);

        // Attach PDF
        $mail->addAttachment($pdfFile, "User_{$userID}.pdf");

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'Order Confirmation - Your Invoice Attached';
        $mail->Body = "
            <h3>Dear $toName,</h3>
            <p>Thank you for your order! Your purchase has been successfully processed.</p>
            <p>Please find your invoice attached for your reference.</p>
            <br>
            <p><strong>Order Details:</strong></p>
            <ul>
                <li><strong>Order ID:</strong> $order_id</li>
                <li><strong>Contact:</strong> $toPhone</li>
                <li><strong>Email:</strong> $toEmail</li>
            </ul>
            <br>
            <p>If you have any questions or need further assistance, feel free to reach out to us.</p>
            <br>
            <p>Best regards,</p>
            <p><strong>Merz Cafe Team</strong></p>
            <hr>
            <p>📞 Contact: +91 98765 43210</p>
            <p>📧 Email: support@example.com</p>
            <p>🌐 Website: <a href='https://www.example.com' target='_blank'>www.example.com</a></p>
        ";
        
        $mail->send();
        return "Success: Email with PDF has been sent!";
    } catch (Exception $e) {
        return "Error: {$mail->ErrorInfo}";
    }
}

?>
