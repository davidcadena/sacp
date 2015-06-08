<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../../login/index.php'>logging in again</a>";
	die();
}

$title = strip_tags($_POST['title']);
$description = $_POST['description'];
$id = $_POST['id'];
$date = $_POST['date'];
$location = $_POST['location'];

if (empty($title) or empty($description)){
	header("Location: ../edit_event.php?id=$id&err=nofill");
	die();
}

include_once('../../includes/database.php');

if($stmt = $mysqli -> prepare("UPDATE events SET name=?, description=?, date=?, location=? WHERE event_id=? ")) {
      $stmt -> bind_param("sssss", $title, $description, $date, $location, $id);
      $stmt -> execute();
      $stmt -> fetch();
      $stmt -> close();
	}

$mysqli -> close();

header('Location: ../index.php');
?>
