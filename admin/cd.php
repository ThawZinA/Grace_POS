<?php
include('session.php');

		$sd=$_POST['sd'];
		$of=$_POST['ed'];

		$ot=date('Y-m-d',strtotime($sd));  
    	$ed=date('Y-m-d',strtotime($of));

$date=date_create($ed);
date_add($date,date_interval_create_from_date_string("1 days"));
echo $ed=date_format($date,"Y-m-d");

    	if($ot>$ed)
    	{
    		echo "<script>window.alert('Start date cannot be earlier than end date !')</script>";
    		echo"<script>window.location='stockinfo.php'</script>";
    	}
    	else
    	{
    		echo"<script>window.location='stockinfo.php?mode=search&id1=$ot&id2=$ed'</script>";
    	}

    	
    	
 
?>