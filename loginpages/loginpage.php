<?php
include '../connection.php';
if(isset($_POST['Login']))
{
    $username =$_POST['UserName'];
    $pass = $_POST["password"];
    $user = $_POST["Usertype"];

    $query ="SELECT * FROM login_info WHERE UserName ='$username' and Password='$pass' and Usertype='$user'";
    
		$result = mysqli_query( $con,$query);

		$row=mysqli_fetch_array($result);

			if($row['Usertype']=="Student")
            {
				?>
				<script type="text/javascript">window.location.href="../bonafide/bonafide.php"
				</script>
				<?php
			}
            elseif($row['Usertype']=="Faculty Member")
            {
				?>
				<script type="text/javascript" > window.location.href="../admin/admin.php"</script>
        		<?php
			}
            else
            {
				?>
				<script type="text/javascript" > window.location.href="loginpage.php";
					alert("Login Failed ..........!!!!!! Try Again !!!!!!!!!!!!!");
				</script>
        		<?php
        		die("Connection Falied".$con->connection_error);
			}	
		}
			
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8"></meta>
    <title>GOVERNMENT POLYTECHNIC AWSARI (KH)</title>
    <link rel="stylesheet" type="text/css" href="../loginpages/logincss.css">
</head>
<body>
   
		<div class="info">
			<h2>Bonafide Generator :</h2>
				<p>A way which reduce efforts and save time while obtaining bonafide in busy life.</p>
		</div>


		<form id="login-form" class="login-form" name="form1" method="post">
			<div class="container">

     			<table>
     				<tr>
     					<td><h1><b>Login Portal</b></h1></td>
     				</tr>
     				<br>
     				<tr>
     					<td><input id="UserName" name="UserName" class="required" placeholder="Login ID " required="required"></td>
     				</tr>
     				<tr>
     					<td><input id="password" name="password" class="required" type="password" placeholder="Password" required="required"></td>
     				</tr>
     				<tr>
     					<td>
     						<select id="Usertype" placeholder="Select User" name="Usertype" required="required">
     							<option selected></option>
								<option value="Student">Student</option>
								<option value="Faculty Member">Faculty Member</option>
     						</select>
     					</td>
     				</tr>
     				<tr>
     					<td>
     						<input type="Submit" name="Login" value="Login">
     					</td>
     				</tr>

     			</table>
			</div>
        </form>
	</body>
</html>
 