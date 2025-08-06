<?php
	include('session.php');
	if(isset($_POST['cart'])){
		$id=$_POST['id'];
		$qty=$_POST['qty'];
		
		$query=mysqli_query($conn,"select * from cart where productid='$id'");
		if (mysqli_num_rows($query)>0)
		{
			
		}
		else{

			
			$qrfe=mysqli_fetch_array($query);
			$fqty=$qrfe['qty'];
			$chq=mysqli_query($conn,"select * from products where productid='$id'");
			$sdf=mysqli_fetch_array($chq);
			$oqty=$sdf['product_qty'];

			if($oqty<$qty)
			{

				echo "Not Enough Quantity!";
			}
					
			else
			{


			mysqli_query($conn,"insert into cart (userid, productid, qty) values ('".$_SESSION['U_ID']."', '$id', '$qty')");
			}
			}


		}
	

?>