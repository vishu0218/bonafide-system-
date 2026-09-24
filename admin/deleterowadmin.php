<?php
	include '../connection.php';

	$name = $_GET['idth'];

	$deletequery = "DELETE FROM login_info WHERE UserName =$name ";

	$query = mysqli_query($con,$deletequery);

	if($query){
		?>
		<script type="text/javascript">
			alert("Delete Successfully");
		</script>
		<?php
	}else{
		?>
		<script type="text/javascript">
			alert("Not Delete");
		</script>
		<?php
	}

	header("location: ../admin/admininfo.php");
?>