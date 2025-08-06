<?php
	session_start();
	
	if (!isset($_SESSION['U_ID']) ||(trim ($_SESSION['U_ID']) == '')) {
	header('location:../index.php');
    exit();
	}
	
	include('../connect.php');

	$sq=mysqli_query($conn,"select * from `user` where username='".$_SESSION['U_ID']."'");
	$srow=mysqli_fetch_array($sq);
	
	$user=$srow['username'];
?>