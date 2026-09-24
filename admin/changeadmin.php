<?php

include '../connection.php';

if(isset($_POST['Submit']))
{
	$user_id = $_POST['userid'];
	$user_name = $_POST['adminname'];
	$user_password = $_POST['password'];
	$user_type = $_POST['facultytype'];
	$insertquery = "INSERT INTO login_info values('$user_id','$user_name','$user_password','$user_type')";
	$result = mysqli_query($con,$insertquery);
}

if(isset($_POST['Log_Out']))
{
	header("location: ../loginpages/loginpage.php");
}

if(isset($_POST['Back_off']))
{
	header("location: ../admin/admininfo.php");
}


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="../admin/main.css">
</head>
<body>
	<header>
		<img src="../IMAGES/msbte.jpeg" alt="msbte-Logo">
		<h2>Admin</h2>
		<form action="" method="post">
			<span>
			<input type="Submit" name="Back_off" value="Retrive"  id="Back_off" style="float: left; ">
	
			<input type="Submit" name="Log_Out" value="Log Out"  id="Log_Out" style="float: right;">
			</span>
		</form>
	</header>
	<br>
	<form action="" method="post">
		<table style="margin-top: 150px; margin-left: 70px;">
			<tr>
				<td>UserId :</td>
				<td><input type="text" name="userid"></td>
			</tr>
			<tr>
				<td>Name of Admin :</td>
				<td><input type="text" name="adminname"></td>
			</tr>
			<tr>
				<td>Password :</td>
				<td><input type="Password" name="password" value="2025"></td>
			</tr>
			<tr>
				<td>Faculty Criteria :</td>
				<td><input type="text" name="facultytype" value="Faculty Member"></td>
			</tr>
			<tr>
				<td><input type="Submit" name="Submit" value="Click Here"></td>
			</tr>
		</table>
	</form>
</body>
</html>