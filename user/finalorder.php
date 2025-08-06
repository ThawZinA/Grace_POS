o<?php
include('session.php');
	if($_POST['paidse'])
	{
$paidamt=$_POST['paidse'];
$name=$_POST['name'];
$ads=$_POST['address'];
$phone=$_POST['PhoneNo'];
$twn=$_POST['township'];


	$qtemp=mysqli_query($conn,"select * from temp where one='$user'");
	$temp=mysqli_fetch_array($qtemp);
	$tt=$temp['ichi'];
	$prid=$temp['two'];
	$tdis=$temp['ni'];
	$tgt=$temp['san'];
	if($paidamt>$tgt)
	{
		echo "<script>window.alert('Excess payment!')</script>";
		echo "<script>window.history.back()</script>";
	}
	else
	{
		$due=$tgt-$paidamt;
		if($due>0)
		{
			$sts='Due-'+$due;
		}
		else
		{
			$sts='Complete';
		}
	$qry=mysqli_query($conn,"select * from cart where userid='$user'");

	$qnb=mysqli_num_rows($qry);

	//echo "uid"; echo $user;
	//echo "st"; echo $tt;
	//echo "pmid"; echo $prid;
	//echo "dis"; echo $tdis;
	//echo "gt"; echo $tgt;
	//echo "pamt"; echo $paidamt;
	//echo "cha"; echo $cha;
	$qrys=mysqli_query($conn,"insert into orders (userid , ototal , promotionid , discount , ogrand , advanced_payment , payment_status,customer_name,customer_address,customer_phone,deliver_township) values ('$user' , '$tt' , '$prid' , '$tdis' , '$tgt' , '$paidamt' , '$sts','$name','$ads','$phone','$twn')");
	if($qrys)
	{//
		$qrya=mysqli_query($conn,"select * from orders where userid='$user' and ototal='$tt' and advanced_payment='$paidamt' order by order_date desc");
	$dato=mysqli_fetch_array($qrya);
	echo $saleid=$dato['orderid'];
	$qdel=mysqli_query($conn,"delete from temp where one='$user'");
	for($count='1';$count<=$qnb;$count++)
	{
		$data=mysqli_fetch_array($qry);
		$prdid=$data['productid'];
		$sqty=$data['qty'];
		$crid=$data['cartid'];
		$dada=mysqli_query($conn,"select * from products where productid=$prdid");
		$dasa=mysqli_fetch_array($dada);
		echo $prprice=$dasa['product_price'];
		$subt=$prprice*$sqty;


		$qrysub=mysqli_query($conn,"insert into orderdetail (orderid,productid,order_qty,order_price,osub_total) values ('$saleid','$prdid','$sqty','$prprice','$subt')");
		if($qrysub)
		{
					$qrydel=mysqli_query($conn,"delete from cart where cartid='$crid'");
					$prdsub=mysqli_query($conn,"select * from products where productid='$prdid'");
					$dela=mysqli_fetch_array($prdsub);
					$oroqty=$dela['product_qty'];
					$oroqty=$oroqty-$sqty;
					$updprd=mysqli_query($conn,"update products set product_qty='$oroqty' where productid='$prdid'");

		}

	}
		//$_SESSION['sidrec']=$saleid;
		echo "<script>window.location='index.php'</script>";
		

	}//
	else
	{
		echo "Error";
	}
	
	}
	}
	else
	{
		
	}
	
	?>