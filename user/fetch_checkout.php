<?php
	include('session.php');
	$qwes=mysqli_query($conn,"delete from temp where one='$user'");
	if(isset($_POST['check'])){
		?>
		<table width="100%" class="table table-striped table-bordered table-hover">
			<thead>
				
				<th>Product Name</th>
				<th>Category</th>
				<th>Product Price</th>
				<th>Purchase Qty</th>
				<th>SubTotal</th>
			</thead>
			<tbody>
			<form method="POST" action="">
			<?php
				$total=0;
				$query=mysqli_query($conn,"select * from cart left join products on products.productid=cart.productid ");
				while($row=mysqli_fetch_array($query)){
						$wqty=$row['wholesaleqty'];
						$cat=$row['categoryid'];
						$qst=mysqli_query($conn,"select * from category where categoryid=$cat");
						$qro=mysqli_fetch_array($qst);
						$pqty=$row['qty'];
					?>
					<tr>
						
						<td><?php echo $row['productname']; ?></td>
						<td><?php echo $qro['category_name']; ?></td>
						<td>
							<?php 
							if($pqty>=$wqty)
							{
								echo $row['wholesaleprice']; 
							}
							else
							{
								echo $row['product_price']; 
							}
							
							?>
								
							</td>
						<td><button type="button" class="btn btn-warning btn-sm minus_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-minus fa-fw"></i></button> 
							<button type="button"class="btn btn-primary btn-sm add_qty2" value="<?php echo $row['productid']; ?>"><i class="fa fa-plus fa-fw"></i></button> 
							<?php echo $row['qty'];?>
						</td>
						<td align="right"><strong><span class="subt">
							<?php
								if($pqty>=$wqty)
							{
								$subtotal=$row['qty']*$row['wholesaleprice'];
							}
							else
							{
								$subtotal=$row['qty']*$row['product_price'];
							}

								
								echo number_format($subtotal,2);
								$total+=$subtotal;

								
								

							?>
						</span></strong></td>
					</tr>
					<?php
				}
				$qryst=mysqli_query($conn,"select * from promotion where status='AD' ");
								$da=mysqli_fetch_array($qryst);
								$proid=$da['promotionid'];
								$lmt=$da['threashloe'];
								$proid='0';
								if($total>=$lmt)
								{
									
									$disp=$da['discount_percentage'];
									$gget=$total/100;
									$disamt=$gget*$disp;
									$fnltt=$total-$disamt;
								}
								else
								{
									$proid='0';
									$disamt='0';	
									$fnltt=$total;
								}

					
								
					$qwe=mysqli_query($conn,"insert into temp (one,ichi,ni,san,two) values ('$user','$total','$disamt','$fnltt','$proid')");

			?>
			<tr>
				<td colspan="4"><span class="pull-right"><strong>Total</strong></span></td>
				<td align="right"><strong><span id="total"><?php echo number_format($total,2); ?></span><strong></td>
			</tr>
			<tr>
				<td colspan="4"><span class="pull-right"><strong>Discount</strong></span></td>
				<td align="right"><strong><span id="total"><?php echo number_format($disamt,2); ?></span><strong></td>
			</tr>
			<tr>
				<td colspan="4"><span class="pull-right"><strong>Grand Total</strong></span></td>
				<td align="right"><strong><span id="total"><?php echo number_format($fnltt,2); ?></span><strong></td>
			</tr>
			</form>
			</tbody>
		</table>
		<?php
	}


?>