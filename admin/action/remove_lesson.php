<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../../login/index.php'>logging in again</a>";
	die();
}

$lesson_id = $_GET['id'];

include_once('../../../includes/database.php');

if($stmt = $mysqli -> prepare("SELECT vm, video FROM lessons WHERE lesson_id = ?")) {
    $stmt -> bind_param("s", $lesson_id);
    $stmt -> execute();
    $stmt->bind_result($vm, $video);
    $stmt -> fetch();
    $stmt -> close();
}

unlink("../../lessons/$lesson_id/$vm");
unlink("../../lessons/$lesson_id/$video");


if($stmt = $mysqli -> prepare("DELETE FROM lessons WHERE lesson_id = ?")) {
    $stmt -> bind_param("s", $lesson_id);
    $stmt -> execute();
    $stmt -> fetch();
    $stmt -> close();
    $mysqli -> close();
}


echo "done, $lesson_id";
?>
