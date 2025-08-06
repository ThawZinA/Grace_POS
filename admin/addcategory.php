<?php
	include('session.php');
	
	$name=$_POST['name'];
	
	
	mysqli_query($conn,"insert into category ( category_name) values ( '$name')");
	
	?>
		<script>
			window.alert('Category added successfully!');
			window.location='category.php';
		</script>
	<?php
?>