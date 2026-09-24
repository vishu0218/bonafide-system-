<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>BONAFIDE PAGE</title>
        <link rel="stylesheet" type="text/css" href="../bonafide/bonafide.css">
    </head>
    <body>
        <header>
            <h2>Bonafide certificate </h2>
            <form action="" method="post">
			<input type="Submit" name="Log_Out" value="Log Out"  id="Log_Out" style="float: right;">
			</form>
        </header>
        <form action="" method="post">
		<div class="Collector">
			<table class="tab">
				<tr>
					<td>
						
					</td>
				</tr>
				<tr>
					<td>Name of Applicant</td>
					<td><input type="text" name="Name" required="required" onfocus="this.value = '';"></td>
					<br>
				</tr>

				<tr>
					<td>Email Id</td>
					<td><input type="Email" name="Email" required="required" onfocus="this.value = '';"></td><br>
				</tr>

				<tr>
					<td>Mobile Number</td>
					<td><input type="number" name="Mobile" required="required" onfocus="this.value = '';"></td><br>
				</tr>
				
				<tr>
					<td>Academic Class</td>
					<td>
						<select id="class" placeholder="Select Year" name="class" required="required" onfocus="this.value = '';">
						<option selected></option>
						<option value="FE">First Year</option>
						<option value="SE">Second Year</option>
						<option value="TE">Third Year</option>
						</select>
					</td><br>
				</tr>
					<td>
						
					</td>
				<tr>
					<td>Department</td>
					<td>
						<select id="dept" placeholder="Select Department" name="dept" required="required" onfocus="this.value = '';">
						<option selected></option>
						<option value="Information Technology">Informatin Technology</option>
						<option value="Computer Engineering">Computer Engineering</option>
						<option value="Mechanical Engineering">Mechanical Engineering</option>
						<option value="Electronics & Telecommunication Engineering">Electronics and Telecommunication Engineering</option>
						<option value="Civil Engineering">Civil Engineering</option>
						</select>
					</td><br>
				</tr>
					<td>
						
					</td>
				<tr>
					<td>Academic Year</td>
					<td><input type="text" name="Year" placeholder="2024-25" required="required" onfocus="this.value = '';"></td>
				</tr><br>
				
				<tr>
					
				</tr>

				<tr>
					<td><input type="Submit" name="Submit" value="Submit"></td>
					<td><input type="Reset" name="Reset" value="Reset"></td>
				</tr>
				<tr>
					
				</tr>

			</table>
		</div>
	</form>

    </body>
</html>

<?php 
include '../connection.php';
if(isset($_POST['Submit']))
{
    $nm = $_POST['Name'];
    $cls = $_POST['class'];
    $dpt = $_POST['dept'];
    $acyear = $_POST['Year'];
    $emailid = $_POST['Email'];
    $Mobile = $_POST['Mobile'];

    $insertquery = "INSERT INTO bonafide_info(Name, Class, Department, Academic_Year, Email, Mobile) VALUES('$nm','$cls','$dpt','$acyear','$emailid','$Mobile')";
        
    $res = mysqli_query($con,$insertquery);
        
    if($res)
    {

        ?>
        <script>
            alert("Data inserted properly")
        </script>
        <?php
    }else
    {

        ?>
        <script>
            alert("Data not inserted properly")
        </script>
        <?php
    }	
}


if (isset($_POST['Log_Out'])) {
    header("location:../loginpages/loginpage.php");
}

if (isset($_POST['Reset'])) {
    header("location:../bonafide/bonafide.php");
}
?>
