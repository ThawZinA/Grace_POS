<?php

$conn = mysqli_connect("localhost","root","","grace");
if (!$conn) {
	die("Connection failed: " . mysqlii_connect_error());
}
 //Check active promotions
	$qpr1=mysqli_query($conn,"SELECT * FROM promotion where status='NA'");
	$cpr1=mysqli_num_rows($qpr1);
	$date=date('Y-m-d');
	$to=date('Y-m-d',strtotime($date));
	for($pr=0;$pr<$cpr1;$pr++)
	{
		$dpr1=mysqli_fetch_array($qpr1);
		$psid=$dpr1['promotionid'];
		$eprd=$dpr1['promo_strdate'];
		$sprd=$dpr1['promo_enddate'];
		if($to>=$sprd && $to<=$eprd)
		{
			$uppsq=mysqli_query($conn,"UPDATE promotion SET status='AD' where promotionid='$psid'");	
		}
		else if($to>=$sprd && $to>$eprd)
		{
			$uppsq=mysqli_query($conn,"UPDATE promotion SET status='EX' where promotionid='$psid'");	
		}
		else
		{
			$uppsq=mysqli_query($conn,"UPDATE promotion SET status='NA' where promotionid='$psid'");	
		}
	}
//................

?>