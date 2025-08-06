<!-- Full Details -->
    <div class="modal fade" id="detail<?php echo $pqrow['salesid']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<center><h4 class="modal-title" id="myModalLabel">Sale Full Details</h4></center>
                </div>
                <div class="modal-body">
				<?php
					$sales=mysqli_query($conn,"select * from sales  where salesid='".$pqrow['salesid']."'");
					$srow=mysqli_fetch_array($sales);
				?>
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-12">
							<span>SaleID: <strong><?php echo ucwords($srow['salesid']); ?></strong></span>
							<span>Seller: <strong><?php echo ucwords($srow['userid']); ?></strong></span>
							<span class="pull-right">Date: <strong><?php echo date("F d, Y", strtotime($srow['sale_date'])); ?></strong></span>
						</div>
					</div>
					<div style="height:10px;"></div>
					<div class="row">
						<div class="col-lg-12">
							<table width="100%" class="table table-striped table-bordered table-hover">
								<thead>
									<tr>
										<th>Product Name</th>
										<th>Price</th>
										<th>Sale Qty</th>
										<th>SubTotal</th>
									</tr>
								</thead>
								<tbody>
									<?php
										$total=0;
										$pd=mysqli_query($conn,"select * from sales_detail left join products on products.productid=sales_detail.productid where salesid='".$pqrow['salesid']."'");
										while($pdrow=mysqli_fetch_array($pd)){
											?>
											<tr>
												<td><?php echo ucwords($pdrow['productname']); ?></td>
												<td align="right"><?php echo number_format($pdrow['s_price'],2); ?></td>
												<td><?php echo $pdrow['sales_qty']; ?></td>
												<td align="right">
													<?php echo $pdrow['sub_total'];
													?>
												</td>
											</tr>
											<?php
										}
									?>
									<tr>
										<td align="right" colspan="3"><strong>SalesAmount</strong></td>
										<td align="right"><strong><?php echo number_format($srow['sales_total'],2); ?></strong></td>
									</tr>
									<tr>
										<td align="right" colspan="3"><strong>Discount</strong></td>
										<td align="right"><strong><?php echo number_format($srow['discount'],2); ?></strong></td>
									</tr>
									<tr>
										<td align="right" colspan="3"><strong>Total</strong></td>
										<td align="right"><strong><?php echo number_format($srow['grandtotal'],2); ?></strong></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>      
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Close</button>
                </div>
            </div>
        </div>
    </div>
