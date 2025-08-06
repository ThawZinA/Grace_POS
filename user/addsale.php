

   <div class="modal fade" id="addsale" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <center><h4 class="modal-title" id="myModalLabel">Sale</h4></center>
                </div>
                <div class="modal-body">
				<div class="container-fluid">
					

					<div style="height:10px;"></div>
                    <form role="form" method="POST" action="addproduct.php">
                    	<?php
						$usid=$_SESSION['U_ID'];
						$a=mysqli_query($conn,"select * from temp where one='$usid'");

						$b=mysqli_fetch_array($a);

					
					?>
                        <div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Total:</span>
                            <input type="text" disabled style="width:400px; text-transform:capitalize;" value="<?php echo ucwords($b['ichi']); ?>" class="form-control" name="name">
                        </div>
						<div style="height:10px;"></div>

					
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Discount:</span>
                            <input type="text" disabled style="width:400px;" value="<?php echo $b['ni'] ?>" class="form-control" name="price">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Grand total:</span>
                            <input type="text" disabled style="width:400px;" value="<?php echo $b['san'] ?>" class="form-control" name="qty">
                        </div>
						<div style="height:10px;"></div>
						<div class="form-group input-group">
                            <span class="input-group-addon" style="width:120px;">Paid:</span>
                            <input type="number" min='0' required="" style="width:400px;"  class="form-control" name="paidse">
                        </div>
				</div>
				
						
				</div>

				</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal"><i class="fa fa-times"></i> Cancel</button>

                    <button type="submit" 	class="btn btn-success"><i class="fa fa-check-square-o" ></i>Complete</button>
                </form>
                </div>
        </div>
    </div>


   