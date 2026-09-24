<?php
session_start();
include '../connection.php';

// Display Success Message After Approval
if (isset($_SESSION['approval_success'])) {
    echo "<script type='text/javascript'>
            alert('".$_SESSION['approval_success']."');
            window.location.href = 'informationtab.php'; // Refresh page to clear message
          </script>";
    unset($_SESSION['approval_success']);
}
if (isset($_POST['Log_Out'])) {
	header("location:../loginpages/loginpage.php");
}

if (isset($_POST['back'])) {
	header("location:../admin/admin.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>APPLICANT LIST</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="../admin/style.css">
</head>
<body>
    <div class="main-div">
        <form action="" method="post">
            <div class="back">
                <input type="Submit" name="Log_Out" value="Log Out" style="float: right;">
            </div>
            <div class="back">
                <input type="Submit" name="back" value="back" style="float: center;">
            </div>
        </form>
        <div class="centered">
            <u><span align="center">APPLICANT INFORMATION</span></u>
        </div> 
        <div class="center-div">
            <div class="table-responsive">
                <table class="tab-tab">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Name</th>
                            <th>Class</th>
                            <th>Department</th>
                            <th>Email id</th>
                            <th>Mobile Number</th>
                            <th>Academic Year</th>
                            <th colspan="3">Operations</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $selectquery = "SELECT * from bonafide_info";
                            $query = mysqli_query($con, $selectquery);
                            $num = mysqli_num_rows($query);

                            while ($result = mysqli_fetch_array($query)) {
                        ?>
                        <tr>
                            <td><?php echo $result['Id']?></td>
                            <td><?php echo $result['Name']?></td>
                            <td><?php echo $result['Class']?></td>
                            <td><?php echo $result['Department']?></td>
                            <td><span class="email-style"><?php echo $result['Email']?></span></td>
                            <td><?php echo $result['Mobile']?></td>
                            <td><?php echo $result['Academic_Year']?></td>
                            <td>
                                <a href="worddoc.php?name=<?php echo $result['Name']; ?>" data-toggle="tooltip" data-placement="top" title="Grant"><i class="fa fa-print" aria-hidden="True"></i></a>
                            </td>
                            <td>
                                <a href="deleterow.php?idth=<?php echo $result['Id']; ?>" data-toggle="tooltip" data-placement="top" title="DELETE"><i class="fa fa-trash" aria-hidden="True"></i></a>
                            </td>
                            <td>
                                <!-- Approve Button -->
                                <?php if($result['status'] == 'pending') { ?>
                                    <a href="approve_request.php?id=<?php echo $result['Id']; ?>" data-toggle="tooltip" data-placement="top" title="Approve"><i class="fa fa-check-circle" aria-hidden="True"></i></a>
                                <?php } else { ?>
                                    <span>Approved</span>
                                <?php } ?>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
