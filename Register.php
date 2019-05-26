<?php
$con = mysqli_connect('localhost','root','','tunescape') or die ("Not Connected");
$auser=$_POST['username'];
$amail=$_POST['email'];
$aname=$_POST['name'];
$apass=$_POST['password'];
$fuser=$_POST['username'];
$fmail=$_POST['email'];
$fname=$_POST['name'];
$fpass=$_POST['password'];
$radio=$_POST['account'];

if($radio == 'artist')
{
	$query="INSERT INTO artist(username,email,name,password) VALUES ('.$user.','.$mail.','.$name.','.$pass.')";
	if($con->query($query)===TRUE)
	{
		echo "New user registered!";
	}
	else
	{
		echo "Registration failed";
	}
	$con->close();
}

/*$result=mysqli_query($con,$query);
if ( false===$result ) {
  printf("error: %s\n", mysqli_error($con));
}
else {
  echo 'done.';
}
/*if($result)
{
    echo "Registration Complete";
}
else
{
    echo "Registration Unsuccessful";
}*/
?>