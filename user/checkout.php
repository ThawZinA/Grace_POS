<?php include('session.php'); ?>
<?php include('header.php'); 
	//Check active promotions
	$qpr1=mysqli_query($conn,"SELECT * FROM promotion where status!='EX'");
	$cpr1=mysqli_num_rows($qpr1);
	$date=date('Y-m-d');
	$to=date('Y-m-d',strtotime($date));
	for($pr=0;$pr<$cpr1;$pr++)
	{
		$dpr1=mysqli_fetch_array($qpr1);
		$psid=$dpr1['promotionid'];
		$sprd=$dpr1['promo_strdate'];
		$eprd=$dpr1['promo_enddate'];
		if($to>=$sprd && $to<=$eprd)
		{
			$uppsq=mysqli_query($conn,"UPDATE promotion SET status='AD' where promotionid='$psid'");	
		}
		else if($to>=$eprd && $to>$sprd)
		{
			$uppesq=mysqli_query($conn,"UPDATE promotion SET status='EX' where promotionid='$psid'");	
		}
		else
		{

		}
	}
//................
?>
<body>
<div class="container">
	<div style="height:50px;"></div>
	<div class="row">
		<div class="col-lg-12">
			<a href="index.php" class="btn btn-primary" style="position:relative; left:3px;"><span class="glyphicon glyphicon-arrow-left"></span> Cancel</a>
		</div>
	</div>
	<div style="height:10px;"></div>
	<div id="checkout_area"></div>
	<div class="row">
		<span class="pull-right" style="margin-right:15px;"><strong>Choose Sale Type Here</strong></span>
	</div>
	<div style="height:20px;"></div>
	<div class="row">

		<button class="btn btn-primary pull-right"  style="margin-right:15px;" data-toggle="modal" data-target="#addsale"><i class="fa fa-check fa-fw"></i>Sale</button>

	<button class="btn btn-primary pull-right"  style="margin-right:15px;" data-toggle="modal" data-target="#addorder"><i class="fa fa-check fa-fw"></i>Order</button>
	</div>
</div>
<?php include('script.php'); ?>
<?php include('addsale.php'); ?>
<?php include('addorder.php'); ?>
<?php include('modal.php'); ?>
<script src="custom.js"></script>
<script>
$(document).ready(function(){
	showCheckout();
	
});
</script>
</body>
</html>