<!DOCTYPE HTML>
<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../login/index.php'>logging in again</a>";
	die();
}

#the $type is what goes in the database
#the $p_type is whats presented to the user

switch ($_GET['type']) {
    case 'windows':
        $type='windows';
        $p_type='Windows';
        break;
    case 'linux':
        $type = 'linux';
        $p_type = 'Linux';
        break;
    case 'cisco':
        $type='cisco';
        $p_type='Cisco';
        break;
    case 'cp_ethics':
        $type='cp_ethics';
        $p_type='CyberPatriot Ethics';
        break;
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
					<h2>Add Lesson | <a href='index.php'>Admin Panel</a></h2>
				</header>
				<div class="container">

					<!-- Content -->
						<section id="content">

							<!-- Text -->
								<section>
									<h3>Add <?php echo $p_type; ?> Content</h3>
									<hr />

									<?php
									
									switch ($_GET['err']) {
    									case 'webm':
        									echo "<p style='color:#F53838 !important; font-weight:bold;'>Videos should be a .webm</p>";
        									break;
    									case 'zip':
        									echo "<p style='color:#F53838 !important; font-weight:bold;'>VMs should be in a .zip</p>";
        									break;
									}
									
									?>

									<form method='post' action='action/add_lesson.php' enctype="multipart/form-data">
									
									<input type='hidden' name='type' value='<?php echo $type; ?>'>
									
									<input type='text' name='title' placeholder='Title'><br>
									
									<b>Your Allowed to Use HTML Here  --  <a href='examples.html' target='_blanc'>HTML Examples</a></b>
									<textarea name='description' rows='6' placeholder='Description of Lesson'></textarea>

									<br>
									
									<p>(optional, .webm ONLY!) <b>Video: <input type="file" name="video"></b></p>
									
									<br>
									
									<p>(optional, .zip ONLY!) <b>VM: <input type="file" name="vm"></b></p>
									
									<br>
									
									<input type='submit' class='button' value='Upload Lesson'>
								</section>
								

						</section>

				</div>
			</section>

		<!-- Footer -->
			

	</body>
</html>