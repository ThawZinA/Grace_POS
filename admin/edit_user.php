<?php
	include('session.php');
	
	$id=$_GET['id'];
	
	$name=$_POST['name'];
	$password=$_POST['password'];
	$role=$_POST['role'];
	
	$use=mysqli_query($conn,"select * from user where username='$name'");
	$ct=mysqli_num_rows($use);
	if($ct>0)
	{
		?>
		<script>
			window.alert('Username already existed!');
			window.history.back();
		</script>
	<?php
	}
	else
	{
		$urow=mysqli_fetch_array($use);
			
			mysqli_query($conn,"update user set username='$name', password='$password', role='$role' where userid='$id'");
			
			?>
				<script>
					window.alert('User updated successfully!');
					window.history.back();
				</script>
			<?php
	}
	

?>