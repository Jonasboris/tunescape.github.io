<?php
$con = mysqli_connect('localhost','root','','tunescape') or die ("Not Connected");

$auser = $_POST['username'];
$amail = $_POST['email'];
$aname = $_POST['name'];
$apass = $_POST['password'];
$aconfirmpassword = $_POST['confirmpassword'];

$fuser = $_POST['username'];
$fmail = $_POST['email'];
$fname = $_POST['name'];
$fpass = $_POST['password'];
$fconfirmpassword = $_POST['confirmpassword'];

$radio=$_POST['account'];

if($radio == 'artist')
{	
	if ($apass != $aconfirmpassword)
	{
		echo("Error... Passwords do not match");
		exit;
	}
	else{
	$sql="INSERT INTO artist(username,email,name,password) VALUES ('$auser','$amail','$aname','$apass')";
	if($con->query($sql)===TRUE)
	{
		include("Loginpage.html");
	}
	else
	{
		echo "Registration Unsuccessful" . $con->error;
	}
	$con->close();
	}
}

else if($radio == 'fan')
{	
	if ($fpass != $fconfirmpassword)
	{
		echo("Error... Passwords do not match");
		exit;
	}
	else{
	$sql1="INSERT INTO fan(username,email,name,password) VALUES ('$fuser','$fmail','$fname','$fpass')";
	if($con->query($sql1)===TRUE)
	{
		include("Loginpage.html");
	}
	else
	{
		echo "Registration Unsuccessful";
	}
	$con->close();
	}
}
?>