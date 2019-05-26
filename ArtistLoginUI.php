
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>Tunescape</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700%7CVarela+Round" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css" />

	<!-- Owl Carousel -->
	<link type="text/css" rel="stylesheet" href="css/owl.carousel.css" />
	<link type="text/css" rel="stylesheet" href="css/owl.theme.default.css" />

	<!-- Magnific Popup -->
	<link type="text/css" rel="stylesheet" href="css/magnific-popup.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="css/ArtistLoginUI.css" />
	
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
	<![endif]-->
</head>

<body>
	<!-- Header -->
	<header id="home">
		<!-- Background Image -->
		<div class="bg-img" style="background-image: url('./img/background1.jpg');">
			<div class="overlay"></div>
		</div>
		<!-- /Background Image -->
	
		<!-- Nav -->
		<nav id="nav" class="navbar nav-transparent">
			<div class="container">

				<div class="navbar-header">
					<!-- Logo -->
					<div class="navbar-brand">
						<a href="Index.html">
							<img class="logo" src="img/logo.png" alt="logo">
							<img class="logo-alt" src="img/logo-alt.png" alt="logo">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Collapse nav button -->
					<div class="nav-collapse">
						<span></span>
					</div>
					<!-- /Collapse nav button -->
				</div>
				
				<!--  Main navigation  -->
				<ul class="main-nav nav navbar-nav navbar-right">
					<li><a href="Index.html">Home</a></li>
					<li><a href="Smart_contract.php">Smart Contract</a></li>
					<li><a href="Edit_profil.php">Edit</a></li>
					<li><a href="Index.html">Logout</a></li>
				<!-- /Main navigation -->
					</ul>
			</div>
		</nav>
		<!-- /Nav -->
		
		<!--picture-->
		
	<a href="#" class="profile-pic">
		<center>
  <div class="profile-pic">
	  <?php
	  	$con = mysqli_connect('localhost','root','','tunescape') or die ("Not Connected");
	  $auser = $_SESSION['varname'];
		  	$sql = "SELECT * FROM creators_details_update WHERE Creators_upd_id = (SELECT id FROM artist WHERE username = '$auser')";
	  		$res=mysqli_query($con,$sql);
	  		if (mysqli_num_rows($res)>0) {
				while($row = $res->fetch_assoc()) {
        			$pic = $row["dp"];
					echo"<div class='profile-pic' style='background-image: url(img/$pic)' >";
				}
			}
	  		echo "</div></center></a>";
			$swl ="SELECT * FROM artist WHERE username = '$auser'";
			$res1=mysqli_query($con,$swl);
			if (mysqli_num_rows($res1)>0) {
				while($row = $res1->fetch_assoc()) {
					$name = $row['name'];
					echo "<div class='ArtistName'>";
					echo "<h1><center>$name</center></h1>";
				}
			}
		   		?>

      <!--<span class="glyphicon glyphicon-camera"></span>
      <span>Change Image</span>-->
		
    <!--<button type="button" id="previewBtn">Share Profil</button>-->	
		<center>
    <img src="" alt="" class="preview">
    <img src="" alt="" class="preview preview--rounded">
			</center>
				</div>	
		<!--/picture-->
	</header>
	
	<!-- Back to top -->
	<div id="back-to-top"></div>
	<!-- /Back to top -->

	<!-- Preloader -->
	<div id="preloader">
		<div class="preloader">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
	<!-- /Preloader -->

	<!-- jQuery Plugins -->
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/owl.carousel.min.js"></script>
	<script type="text/javascript" src="js/jquery.magnific-popup.js"></script>
	<script type="text/javascript" src="js/main.js"></script>

</body>

</html>