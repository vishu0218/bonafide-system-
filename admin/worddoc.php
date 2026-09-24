<?php
session_start();
include '../connection.php';
include_once('../fpdf181/fpdf181/fpdf.php');

if (isset($_GET['name'])) {
    $name = mysqli_real_escape_string($con, $_GET['name']);

    $findquery = "SELECT * FROM stud_info s
                  JOIN department_info d ON s.Dept_id = d.Dept_id
                  JOIN class_info c ON s.Class_id = c.Class_id
                  JOIN personal_info p ON s.Personalinfo_id = p.Personalinfo_id
                  JOIN education_info e ON p.Schoolinfo_id = e.Schoolinfo_id
                  WHERE s.Stud_name = ?";

    $stmt = mysqli_prepare($con, $findquery);
    mysqli_stmt_bind_param($stmt, "s", $name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_array($result);

    if ($row) {
        $nam = $row['Stud_name'];
        $cls = $row['Class_name'];
        $div = $row['Dept_name'];
        $yr = $row['CAd_year'];
        $mail = $row['Email_Id'];
        $date = date("d-M-Y");

        $pdf = new FPDF();
        $pdf->AddPage();
        $pdf->AliasNbPages();

        // Drawing borders, Header, and Content of the PDF
        $pdf->Rect(6, 6, 200, 150, 'D'); 
        $pdf->Rect(7, 7, 198, 148, 'D');
        
        // Header
       // $pdf->Image('../IMAGES/msbte.jpeg', 8, 15, 28);
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Cell(70);
        $pdf->Text(70, 20, "Government Polytechnic Awasari (Kh), Pune");
        
        // Address
        $pdf->SetFont('Arial', '', 11);
        $pdf->Text(70, 40, "Near Manchar, Pune 412101");

        // Certificate Details
        $pdf->Text(10, 60, "No : ");
        $pdf->Text(160, 60, "Date : $date");

        // Title
        $pdf->SetFont('Arial', 'B', 16);
        $pdf->Text(70, 70, "Bonafide Certificate");

        // Body Content
        $pdf->SetFont('Arial', '', 13);
        $pdf->Text(20, 85, "This is to certify that Shri/Kum. $nam is/was a bonafide student of");
        $pdf->Text(10, 95, " this Diploma College. He/She was studying in $cls, $div. During the ");
        $pdf->Text(10, 105, " year $yr. To the best of my knowledge, he/she bears good moral character.");

        // Signatures
        $pdf->SetFont('Arial', 'B', 12);
        $pdf->Text(20, 140, "Clerk's Signature");
        $pdf->Text(90, 140, "HOD's Signature");
        $pdf->Text(160, 140, "Principal's Signature");

        // After generating the PDF, set the success session message
        $_SESSION['bonafide_success'] = "Bonafide certificate for $nam has been generated successfully.";
        
        // Clear Output Buffer Before Sending PDF
        if (ob_get_length()) ob_end_clean();

        // Output PDF
        $pdf->Output();
    } else {
        echo "<script>
                alert('Student not found! Please check the name and try again.');
                window.location.href = '../admin/informationtab.php';
              </script>";
        exit();
    }
} else {
    echo "<script>
            alert('No student name provided!');
            window.location.href = '../admin/informationtab.php';
          </script>";
}
?>
