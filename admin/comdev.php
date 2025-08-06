
<?php
	
	include('session.php');
		$did=$_GET['id'];


	$due=$_POST['du'];
	$oid=$_POST['oid'];
    //$did=$_POST['did'];
    $cn=$_POST['cname'];
	$td=date('Y-m-d');
	

    		$ds=mysqli_query($conn,"update delivery set remark='completed' , completiondate='$td' where deliveryid='$did'");
    		$os=mysqli_query($conn,"update orders set status='completed' , complete_date='$td', final_payment='$due' where orderid='$oid'");
    		if($ds && $os)
    		{
    			echo"<script>window.location='delivery.php'</script>";
    		}

    		
    	
   
  

	?>

