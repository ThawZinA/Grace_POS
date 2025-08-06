<?php
	include('session.php');
	
	$name=$_POST['name'];
	$address=$_POST['address'];
	$contact=$_POST['contact'];

	
	
	mysqli_query($conn,"insert into suppliers ( supplier_name, supplier_address, supplier_phone) values ( '$name', '$address', '$contact')");
	
	?>
		<script>
			window.alert('Supplier added successfully!');
			window.location="supplier.php";
		</script>
	<?php
?>