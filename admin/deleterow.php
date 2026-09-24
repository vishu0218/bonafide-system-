<?php
	include '../connection.php';

	$id = $_GET['idth'];

	$deletequery = "Delete FROM bonafide_info WHERE Id =$id ";

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

	header("location: ../admin/informationtab.php");
?>