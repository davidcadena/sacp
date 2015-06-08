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
        <h1><a href="index.php">SA CyberPatriot</a></h1>
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
					<h2>Admin Panel</h2>
					<p><a href='../coach/index.php'>Coach Panel</a> | <a href='../student/index.php'>Student Panel</a></p>
				</header>
				<div class="container">

					<!-- Content -->
						<section id="content">

							<!-- Text -->
								<section>
									<h3><span class='fa fa-book'></span>&nbsp;&nbsp;Lessons</h3>
									<div class="row">
									<div class=" 6u 12u(medium)">
											<h5>Windows&nbsp;&nbsp;<span class='fa fa-windows'></span></h5>
											<ul>
												<li><a href='add_lesson.php?type=windows'>Add Lesson</a></li>
												<li><a href='edit_lesson.php?type=windows'>Edit Lesson</a></li>
												<li><a href='remove_lesson.php?type=windows'>Remove Lesson</a></li>
											</ul>

											<h5>Linux&nbsp;&nbsp;<span class='fa fa-linux'></span></h5>
											<ul>
												<li><a href='add_lesson.php?type=linux'>Add Lesson</a></li>
												<li><a href='edit_lesson.php?type=linux'>Edit Lesson</a></li>
												<li><a href='remove_lesson.php?type=linux'>Remove Lesson</a></li>
											</ul>

										</div>
										<div class=" 6u 12u(medium)">
											<h5>Cisco&nbsp;&nbsp;<span class='fa fa-globe'></span></h5>
											<ul>
												<li><a href='add_lesson.php?type=cisco'>Add Lesson</a></li>
												<li><a href='edit_lesson.php?type=cisco'>Edit Lesson</a></li>
												<li><a href='remove_lesson.php?type=cisco'>Remove Lesson</a></li>
											</ul>

											<h5>CyberPatriot Ethics&nbsp;&nbsp;<span class='fa fa-university'></span></h5>
											<ul>
												<li><a href='add_lesson.php?type=cp_ethics'>Add Lesson</a></li>
												<li><a href='edit_lesson.php?type=cp_ethics'>Edit Lesson</a></li>
												<li><a href='remove_lesson.php?type=cp_ethics'>Remove Lesson</a></li>
											</ul>

										</div>
									</div>
									<hr />

									<header>
										<h3><span class='fa fa-envelope-o'></span>&nbsp;&nbsp;Contact Users</h3>
									</header>
									<ul>
										<li><a href='invite_coach.php'>Invite Coaches</a></li>
										<li><a href='invite_admin.php'>Invite an Admin</a></li>
										<li><a href='email_blast.php'>Email Blast</a></li>
									</ul>

									<hr />

									<header>
										<h3><span class='fa fa-calendar'></span>&nbsp;&nbsp;Events</h3>
									</header>
									<ul>
										<li><a href='add_event.php'>Add Event</a></li>
										<li><a href='edit_event.php'>Edit Events</a></li>
										<li><a href='remove_event.php'>Remove Events</a></li>
									</ul>

								</section>


						</section>

				</div>
			</section>

		<!-- Footer -->


	</body>
</html>
