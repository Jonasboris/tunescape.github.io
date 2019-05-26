<?php 
$con = mysqli_connect('localhost','root','','sampledb') or die ("Not Connected");
//$db= mysqli_select_db($con,'sampledb') or die ("db not selected");
$name=$_POST['T1'];
$mail=$_POST['E1'];
$date1=$_POST['D1'];
//echo $name;
//$table='sample';
$query="INSERT INTO sample(Name,email,date1) VALUES ('$name','$mail','$date1')";
//echo $query;
$result=mysqli_query($con,$query);
//echo $result;
if ( false===$result ) {
  printf("error: %s\n", mysqli_error($con));
}
else {
  echo 'done.';
}
/*if($result)
{
    echo "Success";
}
else
{
    echo "Fail!";
}
?>*/
