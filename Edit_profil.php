<?php
if(isset($_POST['Save']))
		{
	$con = mysqli_connect('localhost','root','','tunescape') or die ("Not Connected");
	
	$target = "C:\pic";
	$target = $target . basename( $_FILES['dp']['name']);
	$auser = $_POST['pusername'];
	$newauser = $_POST['nusername'];
	$amail = $_POST['pemail'];
	$newamail = $_POST['nemail'];
	$category = $_POST['category'];
	$biography = $_POST['biography'];
	$newpass = $_POST['password'];
	$newconfirmpassword = $_POST['confirmpassword'];
	$dp = ($_FILES['dp']['name']);
	echo $auser.$newauser.$amail.$newamail.$category.$biography.$newpass.$newconfirmpassword.$dp;
		if ($newpass != $newconfirmpassword)
	{
		echo("Error... Passwords do not match");
		//exit;
	}
	else {
	$sql1 = "UPDATE artist SET username ='$newauser' WHERE email= '$amail'";
	
	$sql2 = "UPDATE artist SET email ='$newamail' WHERE username= '$newauser'";
		
	$getid = "SELECT * FROM artist WHERE username = '$newauser'";
		
	if($con->query($sql1)===TRUE) {
		if($con->query($sql2)===TRUE) {
			$res=mysqli_query($con,$getid);
			echo "before id";
			if (mysqli_num_rows($res)>0) {
				while($row = $res->fetch_assoc()) {
        			$id = $row["id"];
					$sql3="INSERT INTO creators_details_update(Creators_upd_id, biography, category, dp) VALUES ('$id', '$biography', '$category', '$dp')";
    			}
				echo $id;
				if($con->query($sql3)===TRUE) {
					echo "Data recorded";
				} else {
					echo "creator error";
				}
		} else {
				echo "id error";
			}

	} else {
			echo "email error";
		}
	} else {
		echo "user name Error" . $con->error;
	}
	$con->close();
		
	}
}
?>

<html>
	<head>
	<link type="text/css" rel="stylesheet" href="css/Edit_profil.css" />
		<link href="https://fonts.googleapis.com/css?family=Varela" rel="stylesheet">
	</head>
	<body>
				
<div class="body-content">
  <div class="module">
    <h1>Edit Profile</h1>
	
    <form class="form" action="Edit_profil.php" method="post" enctype="multipart/form-data" autocomplete="off">
		
      <div class="alert alert-error"></div>
	  <input type="text" placeholder="Previous Username" name="pusername" required />
		<div class="alert alert-error"></div>
	  <input type="text" placeholder="New Username" name="nusername" required />
      <input type="text" placeholder="Previous Email" name="pemail" required />
		<input type="text" placeholder="New Email" name="nemail" required />
		
		<select name="category">
			<option >Category</option>
    		<option value="african">African</option>
			<option value="arabic">Arabic music</option>
    		<option value="asian">Asian</option>
			<option value="blues">Blues</option>
			<option value="classical">Classical</option>
			<option value="carabbean">Carabbean</option>
			<option value="comedy">Comedy</option>
			<option value="contry">Contry</option>
			<option value="electronic">Electronic</option>
			<option value="folk">Folk</option>
			<option value="hiphop">Hip Hop</option>
			<option value="latin">latin</option>
			<option value="pop">Pop</option>
			<option value="rnb">RnB</option>
			<option value="rock">Rock</option>
			<option value="other">Other</option>		
  		</select>
		
		<textarea placeholder="Biography" name="biography" style="width:450px;height:150px;"></textarea>
		
      <input type="password" placeholder="New password" name="password" required />
	
      <input type="password" placeholder="confirm new Password" name="confirmpassword"  required />
	
      <div class="avatar"><label>Select your profil Picture: </label>
		  <input type=”hidden” name=”size” value=”350000″>
		  <input type="file" name="dp" required /></div>
		  
      <input type="submit" value="Save Details" name="Save" class="btn btn-block btn-primary" />
		<h6>If you don't want to change your email and password type the same in the field</h6>
		<br>
		<br>
    </form>
  </div>
</div>
	</body>
	</html>