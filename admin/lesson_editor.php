<?php
session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../login/index.php'>logging in again</a>";
	die();
}

$id = $_GET['id'];

include_once('../includes/database.php');

if($stmt = $mysqli -> prepare("SELECT title, description, video, vm FROM lessons WHERE lesson_id = ?")) {
      $stmt -> bind_param("s", $id);
      $stmt -> execute();
      $stmt -> bind_result($title, $description, $video, $vm);
      $stmt -> fetch();
      $stmt -> close();
      $mysqli->close();
}

if (empty($video)){
	$video = 'NONE!';
}

if (empty($vm)){
	$vm = 'NONE!';
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
					<h2>Edit Lesson | <a href='index.php'>Admin Panel</a></h2>
				</header>
				<div class="container">

					<!-- Content -->
						<section id="content">

							<!-- Text -->
								<section>
									<h3>Edit Lesson</h3>
									<hr />
									<form method='post' action='action/edit_lesson.php' enctype="multipart/form-data">

									<input type='text' name='title' placeholder='Title' value='<?php echo $title; ?>'><br>

									<input type='hidden' name='id' value='<?php echo $id; ?>'>

									<b>Your Allowed to Use HTML Here  --  <a href='examples.html' target='_blanc'>HTML Examples</a></b>
									<textarea name='description' rows='6' placeholder='Description of Lesson'><?php echo $description; ?></textarea>

									<br>

									<p>(optional, .webm ONLY!) <b>Video: <input type="file" name="video"></b>
									<br>
									Current: <?php echo $video; ?>
									</p>

									<br>

									<p>(optional, .zip ONLY!) <b>VM: <input type="file" name="vm"></b>
									<br>
									Current: <?php echo $vm; ?>
									</p>

									<br>

									<input type='submit' class='button' value='Edit Lesson'>
								</section>


						</section>

				</div>
			</section>

		<!-- Footer -->


	</body>
</html>
