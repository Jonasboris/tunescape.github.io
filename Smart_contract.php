<html>
	<head>
		<link type="text/css" rel="stylesheet" href="css/Smart_contract.css" />
	</head>
<body>

<h1>Smart Contract Creation</h1>
	<h3>Service Agreement</h3>

<div>
  <form action="#">p--
    <label for="contract_name">Title Of The Contract<br></label>
    <input type="text" name="title" placeholder="Title">
	  <br>
	  <label for="audio"><br>Song preview<br></label>
	  	<input type="file" name="audio" placeholder="Your song sample" accept="audio/*">
	 <br> 
	  <label for="need"><br>Who You Need<br></label>
	  	<input type="checkbox" name="need[]" value="Designer">Graphic Designer<br>
	  	<input type="checkbox" name="need[]" value="Manager">Manager<br>
	  	<input type="checkbox" name="need[]" value="Director">Director<br>
	  	<input type="checkbox" name="need[]" value="Arranger">Arranger<br>
	  <br>  
	 <label for="date"><br>Date<br></label>
	 	<input type="datetime-local" name="date" placeholder="Date of creation">
	  <br><br>
    <input type="submit" value="Create Contract" name="create">
  </form>
</div>
	
</body>
</html>

<?php 
if(isset($_POST['submitted']))
		{
	$con = mysqli_connect('localhost','root','','tunescape') or die ("Not Connected");
	
	$target = "C:\song";
	$target = $target . basename( $_FILES['audio']['name']);
	$title = $_POST['title'];
	$audio = $_POST['audio'];
	$need = $_POST['need'];
	$selected = $_POST['selected'];
	$date = $_POST['date'];
	$audio = ($_FILES['audio']['name']);
	echo $title.$audio.$need.$date;
		
		if(!empty($_POST['need']))
		{
			
		//Loop to store and display values of individual checked checkbox.
			foreach($_POST['need'] as $selected)
			{
				echo $selected."</br>";
			}
	$sql3="INSERT INTO smart_contract(sc_id,title,song_preview,need,date) VALUES ('$id', '$title','$audio','$selected','$date')";

	if($con->query($sql3)===TRUE)
	{
		echo "Smart Contract created";
	}
	
	else
	{
		echo "Smart Contract Error" . $con->error;
	}
	 $con->close();
		}
	}
	 ?>