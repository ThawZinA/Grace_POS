<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];
	
	$use=mysqli_query($conn,"select * from suppliers where supplierid='id'");
	$urow=mysqli_fetch_array($use);
	
	

	mysqli_query($conn,"update suppliers set supplier_name='$name', supplier_address='$address', supplier_phone='$contact' where supplierid='$id'");
	
	?>
		<script>
			window.alert('Supplier updated successfully!');
			window.history.back();
		</script>
	<?php

?>