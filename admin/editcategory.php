<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	$name=$_POST['name'];
	
	
	$use=mysqli_query($conn,"select * from category where categoryid='id'");
	$urow=mysqli_fetch_array($use);
	
	

	mysqli_query($conn,"update category set category_name='$name' where categoryid='$id'");
	
	?>
		<script>
			window.alert('Category updated successfully!');
			window.history.back();
		</script>
	<?php

?>