<!DOCTYPE HTML>
<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../login/index.php'>logging in again</a>";
	die();
}

#the $type is whats searched for in the database
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
					<h2>Edit <?php echo $p_type; ?> Lessons | <a href='index.php'>Admin Panel</a></h2>
				</header>
				<div class="container">

					<!-- Content -->
						<section id="content">

							<!-- Text -->
								<section>
									<h3>Latest Added</h3>
									<hr />
									<?php

									include_once('../includes/database.php');
									$stmt = $mysqli->prepare('SELECT lesson_id, title, description FROM lessons WHERE type = ?');
                                    $stmt -> bind_param("s", $type);
                                    $stmt->execute();
                                    $stmt->bind_result($lesson_id, $title, $description);
                                    $stmt->store_result();
                                    while($row = $stmt->fetch()) {

										echo "

											<div class='lesson_edit'>
											<p><a href='lesson_editor.php?id=$lesson_id'>
												<b>$title</b><br>
												<i>$description</i>
											<p></a>
											</div>
											<br>

										";

              }

									?>
								</section>


						</section>

				</div>
			</section>

		<!-- Footer -->


	</body>
</html>
