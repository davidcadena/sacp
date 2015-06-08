<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../login/index.php'>logging in again</a>";
	die();
}

$title = strip_tags($_POST['title']);
$date = strip_tags($_POST['date']);
$location = strip_tags($_POST['location']);
$description = $_POST['description'];

if (!isset($title) | !isset($date) | !isset($location)){
  header('Location: ../add_event.php?err=nofill');
  die();
}

include_once('../../includes/database.php');

if($stmt = $mysqli -> prepare("INSERT INTO events (name, date, description, location) VALUES(?, ?, ?, ?)")) {
      $stmt -> bind_param("ssss", $title, $date, $description, $location);
      $stmt -> execute();
      $stmt -> fetch();
      $stmt -> close();
      $mysqli -> close();
}

header('Location: ../index.php');

?>
