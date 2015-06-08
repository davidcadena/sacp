<?php

include_once('includes/database.php');

$event_id = $_GET['id'];

if($stmt = $mysqli -> prepare("SELECT name, description, location, date FROM events WHERE event_id = ?")) {
      $stmt -> bind_param("s", $event_id);
      $stmt -> execute();
      $stmt->bind_result($name, $description, $location, $date);
      $stmt -> fetch();
      $stmt -> close();
      $mysqli->close();
}

?>

<!DOCTYPE HTML>
<html>
	<head>
		<title> </title>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
		<script src="js/jquery.min.js"></script>
		<script src="js/jquery.dropotron.min.js"></script>
		<script src="js/jquery.scrollgress.min.js"></script>
		<script src="js/jquery.scrolly.min.js"></script>
		<script src="js/jquery.slidertron.min.js"></script>
		<script src="js/skel.min.js"></script>
		<script src="js/skel-layers.min.js"></script>
		<script src="js/init.js"></script>
		<noscript>
			<link rel="stylesheet" href="css/skel.css" />
			<link rel="stylesheet" href="css/style.css" />
			<link rel="stylesheet" href="css/style-xlarge.css" />
		</noscript>
		<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
		<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
	</head>
	<body>
		<!-- Header -->
			<header id="header" class="skel-layers-fixed">
        <h1><a href="index.php"  id="eventsa">SA CyberPatriot</a></h1>
				<nav id="nav">
					<ul>
						<li><a href="index.php">Home</a></li>
						<!-- <li>
							<a href="" class="icon fa-angle-down">Layouts</a>
							<ul>
								<li><a href="left-sidebar.html">Left Sidebar</a></li>
								<li><a href="right-sidebar.html">Right Sidebar</a></li>
								<li><a href="no-sidebar.html">No Sidebar</a></li>
								<li>
									<a href="">Submenu</a>
									<ul>
										<li><a href="#">Option 1</a></li>
										<li><a href="#">Option 2</a></li>
										<li><a href="#">Option 3</a></li>
										<li><a href="#">Option 4</a></li>
									</ul>
								</li>
							</ul>
						</li> -->
						<li><a href="events.php">Events</a></li>
						<li><a href="login/index.php">Log In</a></li>
					</ul>
				</nav>
			</header>

      <!-- Events -->
      <section id="three" class="wrapper style1">
				<div class="container">
					<header class="major">
						<h2><?php echo $name; ?></h2>
					</header>
					<div align='center'>

            <h2> <?php echo "$date @ $location"; ?></h2>

            <p><?php echo $description; ?></p>


					</div>
				</div>
			</section>


		<!-- Footer -->
			<footer id="footer">
				<ul class="icons">
					<li><a href="#" class="icon fa-twitter"><span class="label">Twitter</span></a></li>
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-instagram"><span class="label">Instagram</span></a></li>
					<li><a href="#" class="icon fa-dribbble"><span class="label">Dribbble</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Envelope</span></a></li>
				</ul>
				<ul class="menu">
					<li><a href="#">FAQ</a></li>
					<li><a href="#">Terms of Use</a></li>
					<li><a href="#">Privacy</a></li>
					<li><a href="#">Contact</a></li>
				</ul>
				<span class="copyright">
					&copy; Untitled. All rights reserved.
				</span>
			</footer>

	</body>
</html>
