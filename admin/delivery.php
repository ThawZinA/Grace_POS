<?php include('session.php'); ?>
<?php include('header.php'); ?>
<body>
<div id="wrapper">
<?php include('navbar.php'); ?>
<div style="height:50px;"></div>
<div id="page-wrapper">
<div class="container-fluid">
	<div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Delivery
				<span class="pull-right">
					<button class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addproduct"><i class="fa fa-plus-circle"></i> Add Delivery</button>
				</span>
			</h1>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table width="100%" class="table table-striped table-bordered table-hover" id="prodTable">
                <thead>
                    <tr>
                        <th>ID</th>
						<th>Delivery Date</th>
                        <th>Order ID</th>
						<th>Car License</th>
						<th>Delivery Status</th>

                    </tr>
                </thead>
                <tbody>
				<?php
					$pq=mysqli_query($conn,"select * from delivery");

					while($pqrow=mysqli_fetch_array($pq)){
						
						$pid=$pqrow['deliveryid'];
						$eeffefef=mysqli_query($conn,"select * from orders where deliveryid='$pid'");
						$dfe=mysqli_fetch_array($eeffefef);
						$sts=$pqrow['remark'];	
					?>
						<tr>
							<td><?php echo $pqrow['deliveryid']; ?></td>
							<td><?php echo $pqrow['deliverydate']; ?></td>
							<td><?php echo $dfe['orderid']; ?></td>
							<td><?php echo $pqrow['car_license']; ?></td>
							<td>
								
								<?php
								if($sts=='completed')
								{
									echo "Completed";
								}
								else
								{
									
									?>
										<button class="btn btn-primary" data-toggle="modal" data-target="#editpro_<?php echo $pid; ?>"><i class="fa fa-save"></i> Complete</button>
										<?php include('deliverytrans.php'); ?>
									<?php
									
								}

								?>
								 
							</td>
						
						</tr>
					<?php
					}
				?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
</div>
<?php include('script.php'); ?>
<?php include('modal.php'); ?>
<?php include('deliverytrans.php'); ?>
<?php include('add_modal.php'); ?>

<script src="custom.js"></script>
</body>
</html>