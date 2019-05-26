<html>
	<head>
		<title>tunescape Report</title>
		<style type= "text/css">
			table{
				background-color: #6E6EF6;
			}
			
			th{
				width: 150px;
				text-align: left;
			}
		</style>
	</head>
	
	<body background-image: r>
		<center>
	<h1>Report display</h1>
		<form method="post" action="Report_display.php">
		<input type= "hidden" name="submitted" value="true"/>
			<label>Search Category:
				<select name ="category">
					<option value="name">Name</option>
					<option value="username">Username</option>
					<option value="mail">Email</option>
				</select>		
			</label>
			
			<label>Search Criteria: <input type ="text" name="criteria"/>
			</label>
			<input type="submit" />
		</form>
	
		<?php
		if(isset($_POST['submitted']))
		{
			
			//connection to the database
			$con = mysqli_connect('localhost','root','','tunescape') or die ("Not Connected");
			
			$category = $_POST['category'];
			$criteria = $_POST['criteria'];
			$query = "SELECT * FROM artist WHERE $category LIKE '%$criteria%'";
			$result = mysqli_query($con, $query) or die('Error Getting Data');
			$num_rows = mysqli_num_rows($result);
			
			echo"$num_rows Creators";
			echo "<table>";
			echo "<tr> <th>Id</th> <th>Username</th> <th>Email</th>  <th></th> <th>Name</th> </tr>";
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				
				echo"<tr><td>";
				echo $row['id'];
				echo"</td><td>";				
				echo $row['username'];
				echo"</td><td>";	
				echo $row['email'];
				echo"</td><td>";
				echo"</td><td>";
				echo $row['name'];
				echo"<td><tr>";
			}
			
			echo"</table>";
			
			echo"<br><br>";
			$query1 = "SELECT * FROM fan WHERE $category LIKE '%$criteria%'";
			$result = mysqli_query($con, $query1) or die('Error Getting Data');
			$num_rows = mysqli_num_rows($result);
			
			echo"$num_rows Listeners";
			echo "<table>";
			echo "<tr> <th>Id</th> <th>Username</th> <th>Email</th>  <th></th> <th>Name</th> </tr>";
			while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
				
				echo"<tr><td>";
				echo $row['id'];
				echo"</td><td>";				
				echo $row['username'];
				echo"</td><td>";	
				echo $row['email'];
				echo"</td><td>";
				echo"</td><td>";
				echo $row['name'];
				echo"<td><tr>";
			}
			
			echo"</table>";
		}
		
			
		?>
			</center>
	</body>
</html>