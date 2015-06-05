<!DOCTYPE HTML>
<html>
  <head>
    <title>SA CyberPatriot Login</title>
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
        <h1><a href="index.php" style="color: #5674D6;">SA CyberPatriot</a></h1>
			<nav id="nav">
				<ul>
					<li><a href="../index.php">Home</a></li>
					<li><a href="../events.php">Events</a></li>
					<li><a href="index.php">Log In</a></li>
				</ul>
			</nav>
      </header>

    <!-- Main -->
      <section id="main" class="wrapper style1">
        <div class="container">

          <!-- Content -->
            <section id="content">

              <!-- Text -->
                <section>
                  <h3>Log In</h3>
					<?php
						if ($_GET['err'] == 'wrong'){
							echo "<p style='color:#F53838 !important; font-weight:bold;'>Email or Password Incorrect</p>";
						}
					?>
					<form action='login.php' method='post'>
					<div class="6u 12u(small)">
					<input type='text' name='email' placeholder='Email'><br>
					<input type='password' name='password' placeholder='Password'><br>
					<input type='submit' value='Log In'>
					</div>
					</form>
                  <hr />
				  <br>
				  <div align='center'>
				  <ul class="actions">
							<li><a href="#" class="button big">Reedem Access Code</a></li> <li><a href="#" class="button big">Request Access Code</a></li>
				  </ul>
				</div>

            </section>

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
