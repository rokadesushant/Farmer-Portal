
<?php
	include 'database.php';
	$phone=$_POST['phone'];
	$securityq=$_POST['securityq'];
	$securitya=$_POST['securitya'];
	$password=$_POST['password'];
	$cpassword=$_POST['cpassword'];

	$query="Select phoneno,securityq,securitya from user where phoneno=$phone and securityq='$securityq' and securitya='$securitya'";

	$result=mysqli_query($link,$query);
    $count = mysqli_num_rows($result);

	if ($count==1) {
		$update="update user set password='$password' where phoneno=$phone";
		mysqli_query($link,$update);
		header("Location:login.php");
	}
	else 
	{
		header("Location:forgot-password.php");
	}

?>
