<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../login/index.php'>logging in again</a>";
	die();
}

$id = $_GET['id'];

include_once('../../includes/database.php');

if($stmt = $mysqli -> prepare("DELETE FROM events WHERE event_id = ?")) {
      $stmt -> bind_param("s", $id);
      $stmt -> execute();
      $stmt -> fetch();
      $stmt -> close();
      $mysqli->close();
}

header('Location: ../index.php');

?>
