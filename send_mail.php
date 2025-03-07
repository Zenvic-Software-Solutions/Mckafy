<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php'; // Include PHPMailer
require 'food_admin/fpdf/fpdf.php'; // Include FPDF

function generatePDF($toName, $toEmail, $toPhone, $userID, $type) {
    class IDCardPDF extends FPDF {
        function Header() {
            // Card Background
           
        }
        function Footer() {
            $this->SetY(-15); // Position at 15mm from bottom
            $this->SetFont('Arial', 'B', 4);
            $this->SetTextColor(0, 0, 0);
    
            // Footer Content (Contact Info)
            $this->Cell(0, 3, 'Contact: +91 98765 43210', 0, 1, 'C'); // Contact Number
            $this->Cell(0, 3, 'Email: support@example.com', 0, 1, 'C'); // Email
            $this->Cell(0, 3, 'Website: www.example.com', 0, 1, 'C'); // Website URL
        }
    }
    
    
    $pdf = new IDCardPDF('P', 'mm', [50, 85]); // Custom ID card size
    $pdf->AddPage();
    
    // Card Border (Simulating ID Card Look)
    $pdf->SetDrawColor(0, 0, 0);
    $pdf->Rect(2, 2, 46, 81);
    
    // **1. Header: ID Card Title**
    $pdf->SetFont('Arial', 'B', 8);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetY(4); 
    $pdf->Cell(30, 4, 'EXPO ID CARD', 0, 1, 'C');
    $pdf->Ln(2);
    
    // **2. Profile Image**
    $pdf->Image('assets/img/logo2.png', 10, 12, 30, 28, 'PNG'); // Slightly smaller
    $pdf->Ln(34); // Adjusted space after image
    
    // **3. Student Details**
    $pdf->SetX(6);
    $pdf->SetFont('Arial', 'B', 6.5);
    $pdf->Cell(10, 4, 'Name:', 0);
    $pdf->SetFont('Arial', '', 6.5);
    $pdf->Cell(38, 4, $toName, 0, 1);
    
    $pdf->SetX(6);
    $pdf->SetFont('Arial', 'B', 6.5);
    $pdf->Cell(10, 4, 'Phone:', 0);
    $pdf->SetFont('Arial', '', 6.5);
    $pdf->Cell(38, 4, $toPhone, 0, 1);
    
    $pdf->SetX(6);
    $pdf->SetFont('Arial', 'B', 6.5);
    $pdf->Cell(10, 4, 'Email:', 0);
    $pdf->SetFont('Arial', '', 6.5);
     // **Manually Break Email if it's Too Long**
     if (strlen($toEmail) > 25) {
        $emailParts = str_split($toEmail, 25);
        foreach ($emailParts as $index => $part) {
            if ($index == 0) {
                $pdf->Cell(34, 4, $part, 0, 1); // First line
            } else {
                $pdf->Cell(10, 4, '', 0); // Indentation for continuation
                $pdf->Cell(34, 4, $part, 0, 1);
            }
        }
    } else {
        $pdf->Cell(38, 4, $toEmail, 0, 1);
    }
    
    $pdf->SetX(6);
    $pdf->SetFont('Arial', 'B', 6.5);
    $pdf->Cell(10, 4, 'Order Id:', 0);
    $pdf->SetFont('Arial', '', 6.5);
    $pdf->Cell(38, 4, $type); // Ensures college stays within one page
    
    // **Save and Output PDF**
    $filePath = "pdfs/user_{$userID}.pdf"; 
    $pdf->Output($filePath, 'F'); 

    return $filePath;
}

function sendRegistrationMail($toEmail, $toName, $toPhone, $userID, $type) {
    $pdfFile = generatePDF($toName, $toEmail,$toPhone, $userID, $type); // Create PDF
    
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
        $mail->setFrom('webdevvasanth@gmail.com', 'https://zenvicsoft.com/');
        $mail->addAddress($toEmail, $toName);

        // Attach PDF
        $mail->addAttachment($pdfFile, "User_{$userID}.pdf");

        // Email Content
        $mail->isHTML(true);
        $mail->Subject = 'Registration Successful - Your ID Card';
        $mail->Body = "
        <h3>Dear $toName,</h3>
        <p>Your registration was successful!</p>
        <p>Find your attached ID Card.</p>
        <br>
        <p>Regards,</p>
        <p><strong>Your Website Team</strong></p>
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
