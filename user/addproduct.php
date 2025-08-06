o<?php
include('session.php');
	if($_POST['paidse'])
	{
$paidamt=$_POST['paidse'];

	$qtemp=mysqli_query($conn,"select * from temp where one='$user'");
	$temp=mysqli_fetch_array($qtemp);
	$tt=$temp['ichi'];
	$prid=$temp['two'];
	$tdis=$temp['ni'];
	$tgt=$temp['san'];
	if($paidamt<$tgt)
	{
		echo "<script>window.alert('Not enough payment!')</script>";
		echo "<script>window.history.back()</script>";
	}
	else
	{
		$cha=$paidamt-$tgt;
	$qry=mysqli_query($conn,"select * from cart where userid='$user'");

	$qnb=mysqli_num_rows($qry);
	//echo "uid"; echo $user;
	//echo "st"; echo $tt;
	//echo "pmid"; echo $prid;
	//echo "dis"; echo $tdis;
	//echo "gt"; echo $tgt;
	//echo "pamt"; echo $paidamt;
	//echo "cha"; echo $cha;
	$qrys=mysqli_query($conn,"insert into sales (userid , sales_total , promotionid , discount , grandtotal , paid_amount , changee) values ('$user' , '$tt' , '$prid' , '$tdis' , '$tgt' , '$paidamt' , '$cha')");
	if($qrys)
	{//
		$qrya=mysqli_query($conn,"select * from sales where userid='$user' and sales_total='$tt' and changee='$cha' order by sale_date desc");
	$dato=mysqli_fetch_array($qrya);
	$saleid=$dato['salesid'];
	$qdel=mysqli_query($conn,"delete from temp where one='$user'");
	for($count='1';$count<=$qnb;$count++)
	{
		$data=mysqli_fetch_array($qry);
		$prdid=$data['productid'];
		$sqty=$data['qty'];
		$crid=$data['cartid'];
		$dada=mysqli_query($conn,"select * from products where productid=$prdid");
		$dasa=mysqli_fetch_array($dada);
		$prprice=$dasa['product_price'];
		$subt=$prprice*$sqty;


		$qrysub=mysqli_query($conn,"insert into sales_detail (salesid,productid,sales_qty,s_price,sub_total) values ('$saleid','$prdid','$sqty','$prprice','$subt')");
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
		$_SESSION['sidrec']=$saleid;
		echo "<script>window.location='Receipt.php'</script>";
		

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