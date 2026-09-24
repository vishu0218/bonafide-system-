<?php
include '../connection.php';
session_start();

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '../PHPMailer/src/PHPMailer.php';
require '../PHPMailer/src/SMTP.php';
require '../PHPMailer/src/Exception.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Update status to 'approved'
    $updateQuery = "UPDATE bonafide_info SET status = 'approved' WHERE Id = ?";
    $stmt = mysqli_prepare($con, $updateQuery);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    // Fetch the student's email to send approval message
    $selectQuery = "SELECT Email FROM bonafide_info WHERE Id = ?";
    $stmt = mysqli_prepare($con, $selectQuery);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    $email = $row['Email'];

    // Send email using PHPMailer
    $mail = new PHPMailer(true);
    try {
        // SMTP configuration
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com'; 
        $mail->SMTPAuth   = true;
        $mail->Username   = 'vishwajeetgodse06@gmail.com'; // 🔁 Replace with your email
        $mail->Password   = 'ixgc ztxj tljr isdl';    // 🔁 Use Gmail App Password
        $mail->SMTPSecure = 'tls';
        $mail->Port       = 587;

        // Email content
        $mail->setFrom('your-email@gmail.com', 'Admin'); // 🔁 Replace as needed
        $mail->addAddress($email);
        $mail->Subject = 'Bonafide Certificate Approved';
        $mail->Body    = "Dear Student,\n\nYour bonafide certificate request has been approved.\n\n Take Bonaide from the college. \n\nThank you.\nAdmin";

        $mail->send();
        $_SESSION['approval_success'] = "Bonafide request approved and student notified.";
    } catch (Exception $e) {
        $_SESSION['approval_success'] = "Bonafide approved but email failed. Error: {$mail->ErrorInfo}";
    }

    // Redirect back to the information tab
    header('Location: informationtab.php');
    exit();
} else {
    echo "No request ID provided!";
}
?>
