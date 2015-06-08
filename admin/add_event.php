<!DOCTYPE HTML>
<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../login/index.php'>logging in again</a>";
	die();
}

?>

<html>
	<head>
		<title>SACP Admin</title>
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

    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
    <link rel="stylesheet" href="/resources/demos/style.css">
    <script>
    $(function() {
      $( "#datepicker" ).datepicker();
    });
    </script>

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
        <h1><a href="index.html">SA CyberPatriot</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="../events.php">Events</a></li>
					<li><a href="../login/logout.php">Log Out</a></li>
				</ul>
			</nav>
      </header>

		<!-- Main -->
			<section id="main" class="wrapper style1">
				<header class="major">
					<h2>Add Event | <a href='index.php'>Admin Panel</a></h2>
				</header>
				<div class="container">

					<!-- Content -->
						<section id="content">

							<!-- Text -->
								<section>

									<?php

									switch ($_GET['err']) {
    									case 'nofill':
        									echo "<p style='color:#F53838 !important; font-weight:bold;'>All Fields Are Manditory</p>";
        									break;
									}

									?>

									<form method='post' action='action/add_event.php' >

                  <b>Title:</b>
									<input type='text' name='title'><br>

                  <b>Location:</b>
                  <input type='text' name='location'><br>

                  <b>Description:</b><br>
									<b>Your Allowed to Use HTML Here  --  <a href='examples.html' target='_blanc'>HTML Examples</a></b>
									<textarea name='description' rows='6'></textarea>

                  <br>

                  <b>Date:</b>
                  <input type="text" id="datepicker" name='date'>

									<br>

									<input type='submit' class='button' value='Add Event'>
								</section>


						</section>

				</div>
			</section>

		<!-- Footer -->


	</body>
</html>
