<?php
	include('session.php');
	
	$name=$_POST['name'];
	$password=$_POST['password'];
	$role=$_POST['role'];

	
	$se=mysqli_query($conn,"select * from user where username='$name'");
	$ct=mysqli_num_rows($se);
	if ($ct>0) {
		?>
		<script>
			window.alert('Username already existed!');
			window.history.back();
		</script>
	<?php
	}
	else
	{
		mysqli_query($conn,"insert into user ( username, password, role) values ( '$name', '$password', '$role')");
	
	?>
		<script>
			window.alert('User added successfully!');
			window.location='user.php';
		</script>
	<?php
	}
	
?>