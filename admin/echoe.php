<?php
include('session.php');
	$mname=$_POST['name'];
		$pcl=$_POST['price'];
		$sd=$_POST['sdate'];
		$of=$_POST['edate'];
   		 $ot=date('Y-m-d',strtotime($sd));  
    	$ed=date('Y-m-d',strtotime($of));
		$d=$_POST['dis'];


		$query=mysqli_query($conn,"SELECT * FROM Promotion where promo_strdate BETWEEN '$ot' and '$ed'");
			$num=mysqli_num_rows($query);
			if($num>0) 
			{echo"<script>window.alert('Similar promotion already existed. Please another Date to avoid error!!!')</script>";
			echo "<script>window.location='promotion.php'";
				}
			else if($ot>$ed)
			{
				echo"<script>window.alert('End date cannot be earlier than the start date!')</script>";
				echo "<script>window.location='promotion.php'";
			}
			else
			{	
				$query=mysqli_query($conn,"INSERT into Promotion(PRName,threashloe,promo_strdate,promo_enddate,discount_percentage) values ('$mname','$pcl','$ot','$ed','$d')");
				if($query)
				{echo"<script>window.alert('Promotion Scheme created successfully!')</script>";
				echo"<script>window.location='promotion.php'</script>";}
				else{echo"<script>window.alert('Something happened during import to datatbase. Data not imported!')</script>";
			echo "<script>window.location='promotion.php'";}
		}
		
?>