<?php
   $con = mysqli_connect('localhost','root','','tunescape') or die ("Not Connected");
   
 $auser = $_POST['username'];
 $apass = $_POST['password'];
 
 $fuser = $_POST['username'];	
 $fpass = $_POST['password'];

$radio=$_POST['account'];;

if($radio == 'artist')
{
	$q1= "SELECT * FROM artist WHERE username='$auser' AND password = '$apass' "; 
	
	$res=mysqli_query($con,$q1);
	if (mysqli_num_rows($res)>0) {
		$_SESSION['varname'] = $auser;
		include("ArtistLoginUI.php");
		
	} else
	{
		echo "Wrong password or Username <br>";
	}
}

if($radio == 'fan')
{
	$q1= "SELECT * FROM fan WHERE username='$auser' AND password = '$apass' "; 
	
	$res=mysqli_query($con,$q1);
	if (mysqli_num_rows($res)>0) {
		include("Listerners.html");
		
	} else
	{
		echo "Wrong password or Username <br>";
	}
}
?>