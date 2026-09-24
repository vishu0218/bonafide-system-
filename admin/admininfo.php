<!DOCTYPE html5>
<html>
<head>
	<title>Admin Data</title>
	<link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css">
	<link rel="stylesheet" type="text/css" href="../admin/style.css">
</head>
<body>
 	<div class="main-div">
 		<form action="" method="post">
            <div class="madmin">
                <input type="Submit" name="Add_admin" value="ADD NEW ADMIN" >
            </div>
            <div class="mdona">
                <input type="Submit" name="Log_Out" value="Log Out" style="float: right;">
            </div>
			<div class="back">
                <input type="Submit" name="back" value="back" style="float: center;">
            </div>
        </form>
		
        <div class="centered">
  			<u><span align="center">ADMIN INFORMATION</span></u>
		</div> 
        
    	<div class="center-div">
    		<div class = "table-responsive">
    			<table>
    					<thead>
    						<tr>
    							<th>UserId</th>
                                <th>Name of User</th>
    							<th>Password</th>
    							<th>Operations</th>
    						</tr>
    					</thead>

    					<tbody>
    						<?php
	
								include '../connection.php';

								$selectquery = "SELECT * FROM login_info WHERE Usertype = 'Faculty Member'";

								$query = mysqli_query($con,$selectquery);

								$num = mysqli_num_rows($query);

								while($result = mysqli_fetch_array($query)){
									?>
									<tr>
    									<td><?php echo $result['UserName']?></td>
    									<td><?php echo $result['NameofUser']?></td>
                                        <td><?php echo $result['Password']?></td>   
    									<td>
										<a href="deleterowadmin.php?idth=<?php echo urlencode($result['UserName']); ?>" 
   data-toggle="tooltip" 
   data-placement="top" 
   title="DELETE" 
   onclick="return confirm('Are you sure you want to delete this admin?');">
   <i class="fa fa-trash" aria-hidden="true"></i>
</a>

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

<?php
if (isset($_POST['Log_Out'])) {
            header("location:../loginpages/loginpage.php");
        }

if (isset($_POST['Add_admin'])) {
            header("location:../admin/changeadmin.php");
        }
		if (isset($_POST['back'])) {
            header("location:../admin/admin.php");
        }
?>                

