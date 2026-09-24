<?php
    
    include '../connection.php';

    if (isset($_POST['Admininfo'])) {
        header("location:Admininfo.php");
    }elseif (isset($_POST['Bonafideinfo'])) {
        header("location:Informationtab.php");
    }


    if (isset($_POST['Log_Out'])) {
            header("location:../loginpages/loginpage.php");
    }
?>


<!DOCTYPE html5>
<html>
<head>
    <title></title>
    <link rel="stylesheet" type="text/css" href="../admin/admin.css">
</head>
<body>
    <form action="" method="POST">
        <header>
        <h1>Admin Session</h1>
        <input type="Submit" name="Log_Out" value="Log Out" id="Log_Out" style="float: right;">
        </header>
        
        <div class="modal-body">
            <div class="madmin">
                <input type="Submit" name="Admininfo" value="Admin Info">
            </div>
            <br>
            <div class="mdona">
                <input type="Submit" name="Bonafideinfo" value="Bonafide Info">
            </div>
        </div>
    </form>

    <footer>
        
    </footer>
</body>
</html>



