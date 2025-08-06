<?php include('header.php'); ?>
<?php  
session_start();
include('connect.php');

if(isset($_POST['btnsignin']))
{
	$userid=$_POST['txtuserid'];
	$password=$_POST['txtpassword'];	



		$stq=mysqli_query($conn,"SELECT * FROM user where username='$userid' and password='$password'")or die("Can't Select");
		$stct=mysqli_num_rows($stq);

		if($stct<1)
			{?>
				<script>window.alert('Invalid!')</script>;
				<script>window.location='index.php'</script>;
				<?php
			}
		else
		{
			$da=mysqli_fetch_array($stq);
		$role=$da['role'];
		$name=$da['username'];
		
		
			$_SESSION['U_ID']=$name;
			$_SESSION['role']=$role;

		
		if($role=='Admin')
		{
			?><script>window.location='admin/'</script>;<?php
		}
		
		else if($role=='Sale')
		{
			?><script>window.location='user/'</script>;<?php
		}
		else
			{
			?><script>window.location='d.php'</script>;<?php
		}
		}
		
		
		}

		
	
?>
<html>
<head>
<title>User Login</title>
<script src="script/jquery.js"></script>
</head>
<body>
	<div class="container">
	<div id="login_form" class="well">

	<h2><center><span class="glyphicon glyphicon-lock"></span> Please Login</center></h2>
		<hr>
		<form action="index.php" method="post">
			Username: <input type="text" name="txtuserid" class="form-control" required>
		<div style="height: 10px;"></div>
<table align="center" cellspacing="3px" style="margin-top: 200px">
	
Password: <input type="password" name="txtpassword" class="form-control" required> 
		<div style="height: 10px;"></div>

<input type="submit" name="btnsignin" value="Signin"/>
		</form>
		<div style="height: 15px;"></div>
		<div style="color: red; font-size: 15px;">

<?php
	if(isset($_SESSION['condition']))
	{
		echo "<tr><td colspan='2'>You have  10 seconds to focefully logout your account before this link go dead.</td></tr>";
		echo "<tr><td colspan='2' align='right'><a href=fclg.php>Force Logout</a></td></tr>";
		echo "<meta http-equiv='refresh' content='10;url=logout.php'>";
	}

?>
</table>
</form>
</div>
</div>
<?php include('script.php'); ?>
</body>

</html>







