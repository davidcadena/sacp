<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../login/index.php'>logging in again</a>";
	die();
}

$type = $_POST['type'];
$title = strip_tags($_POST['title']);
$description = $_POST['description'];

if (isset($_FILES['video']["name"])){
	$video = $_FILES["video"]["name"];
	if (substr($video, -5) !== '.webm'){
		header("Location: ../add_lesson.php?type=$type&err=webm");
		die();
	}
}

if (isset($_FILES['vm']["name"])){
	$vm = $_FILES["vm"]["name"];
	if (substr($vm, -4) !== '.zip'){
		header("Location: ../add_lesson.php?type=$type&err=zip");
		die();
	}
}

include_once "../../includes/database.php";

if($stmt = $mysqli -> prepare("INSERT INTO lessons (title, description, video, vm, type) VALUES(?, ?, ?, ?, ?)")) {
      $stmt -> bind_param("sssss", $title, $description, $video, $vm, $type);
      $stmt -> execute();
      $stmt -> fetch();
      $stmt -> close();
}

	if($stmt = $mysqli -> prepare("SELECT lesson_id FROM lessons WHERE title=? AND description=? AND video=? AND vm=? AND type=?")) {
      $stmt -> bind_param("sssss", $title, $description, $video, $vm, $type);
      $stmt -> execute();
      $stmt -> bind_result($lesson_id);
      $stmt -> fetch();
      $stmt -> close();
      $mysqli -> close();
}


$lesson_path = "../../lessons/$lesson_id";

mkdir($lesson_path, 0755);

if (isset($video)){
	$lesson_path = $lesson_path . basename( $_FILES['video']['name']); 
	if(move_uploaded_file($_FILES['video']['tmp_name'], $lesson_path)) {
	} else{
    	echo "<p>There was an error uploading the video, please try again. Contact a David!</p>";
	}
}

if (isset($vm)){
	$lesson_path = $lesson_path . basename( $_FILES['vm']['name']); 
	if(move_uploaded_file($_FILES['vm']['tmp_name'], $lesson_path)) {
	} else{
    	echo "<p>There was an error uploading the vm, please try again. Contact a David!</p>";
	}
}

echo 'done!';
?>