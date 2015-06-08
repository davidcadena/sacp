<?php
session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../login/index.php'>logging in again</a>";
	die();
}

$id = $_GET['id'];

include_once('../includes/database.php');

if($stmt = $mysqli -> prepare("SELECT name, description, location, date FROM events WHERE event_id = ?")) {
      $stmt -> bind_param("s", $id);
      $stmt -> execute();
      $stmt -> bind_result($title, $description, $location, $date);
      $stmt -> fetch();
      $stmt -> close();
      $mysqli->close();
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
					<h2>Edit Lesson | <a href='index.php'>Admin Panel</a></h2>
				</header>
				<div class="container">

					<!-- Content -->
						<section id="content">

							<!-- Text -->
								<section>
									<h3>Edit Event</h3>
									<hr />
									<form method='post' action='action/edit_event.php' enctype="multipart/form-data">

                    <b>Title:</b><br>
									<input type='text' name='title' value='<?php echo $title; ?>'><br>

									<input type='hidden' name='id' value='<?php echo $id; ?>'>

									<b>Description of Event: <br> Your Allowed to Use HTML Here  --  <a href='examples.html' target='_blanc'>HTML Examples</a></b>
									<textarea name='description' rows='6'><?php echo $description; ?></textarea>

									<br>

                  <b>Location:</b><br>
                <input type='text' name='location' value='<?php echo $location; ?>'><br>

                <b>Date:</b><br>
                <input type='text' name='date' id="datepicker" value='<?php echo $date; ?>'><br>



									<input type='submit' class='button' value='Edit Event'>
								</section>


						</section>

				</div>
			</section>

		<!-- Footer -->


	</body>
</html>
