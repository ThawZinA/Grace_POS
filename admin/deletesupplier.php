<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	
	mysqli_query($conn,"delete from suppliers where supplierid='$id'");
	
	header('location:supplier.php');

?>