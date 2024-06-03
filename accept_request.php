
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.min.css'></link> 
</head>
<body>

<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
include 'db_connection.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'phpmailer/src/Exception.php';
require 'phpmailer/src/PHPMailer.php';
require 'phpmailer/src/SMTP.php';

// Check if the request ID is provided
if (isset($_GET['id'])) {
    $request_id = $_GET['id'];

    // Update the request status to 'accepted'
    $sql = "UPDATE requests SET status = 'accepted' WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $request_id);

    if ($stmt->execute()) {
        // Request accepted successfully
        // Send the email notification
        $mail = new PHPMailer(true);
        try {
            //Server settings
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     // Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
            $mail->Username   = 'finalprojectlevel4@gmail.com';         // SMTP username
            $mail->Password   = 'cfst sfxa illn vghb';                  // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            // Enable implicit TLS encryption
            $mail->Port       = 465;                                    // TCP port to connect to

            //Recipients
            $mail->setFrom('finalprojectlevel4@gmail.com', 'Garage');
            $request_email = $_GET['email'];
            $mail->addAddress($request_email);             // Add a recipient

            // Content
            $mail->isHTML(true);                                        // Set email format to HTML
            $mail->Subject = 'Request Accepted';
            $garage=$_GET['garage'];
            $address=$_GET['address'];
            $mail->Body    = "The Garage {$garage} Locatein  {$address} Thanking you for getting in touch! We got your request, We're excited to help you out. we'll call you in a few minutes to talk more.  Thanks for choosing us!";

            $mail->send();
            ?>
            <script>
            window.alert('Email Sent!');
            window.location='garage_owner_dashboard.php'
            </script>
            <?php
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        // Error occurred
        echo "Error updating request status: " . $stmt->error;
    }

    $stmt->close();
} else {
    // Request ID not provided
    echo "Invalid request.";
}

$conn->close();
?>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.12.15/dist/sweetalert2.all.min.js"></script>  
</body>
</html>