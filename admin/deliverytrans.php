<div class="modal fade" id="editpro_<?php echo $pid; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Delivery</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">


					<?php
						$a=mysqli_query($conn,"select * from delivery where deliveryid='$pid'");
						$b=mysqli_fetch_array($a);
						$c=mysqli_query($conn,"select * from orders where deliveryid='$pid'");
						$d=mysqli_fetch_array($c);
						$de=$d['advanced_payment'];
						$fe=$d['final_payment'];
						$de=$de+$fe;
						$dg=$d['ogrand'];
						$du=$dg-$de;
					?>
					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="comdev.php<?php echo '?id='.$pid; ?>" >
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">DeliveryID:</span>
                            <input type="text" style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['deliveryid']); ?>" class="form-control" name="did" readonly>
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">OrderID:</span>
                            
                            <input type="text" style="width:400px;" value="<?php echo $d['orderid'] ?>" class="form-control" name="oid" readonly>
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Due:</span>
                            <input type="text" style="width:400px;" value="<?php echo $du; ?>" class="form-control" name="du" readonly>
                        </div>
                        <div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">CName:</span>
                            <input type="text" style="width:400px;" value="<?php echo $d['customer_name'] ?>" class="form-control" name="cname" readonly>
                        </div>
						
                        
				</div>
				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o"></i> Complete</button>
					</form>
                </div>
        </div>
    </div>