<?php
	include('session.php');
	$pid=$_GET['id'];
	
	$a=mysqli_query($conn,"select * from products where productid='$pid'");
	$b=mysqli_fetch_array($a);
	
	mysqli_query($conn,"delete from products where productid='$pid'");
	
	header('location:product.php');

?>