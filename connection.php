<?php
$username = 'root';
$password = '';
$db = 'certificate';
$server = 'localhost';


$con= mysqli_connect($server,$username,$password,$db);

if($con){

}else
	{
		die("connection failed: " .$con->connection_error);
	}

?>