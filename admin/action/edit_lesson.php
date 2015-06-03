<?php

session_start();
if ($_SESSION['user_level'] !== 'admin'){
	echo "This Page is for Admins Only! <br> If you are an admin, please renew your session by <a href='../../login/index.php'>logging in again</a>";
	die();
}

$title = $_POST['title'];
$description = $_POST['description'];
$id = $_POST['id'];
$video = $_FILES["video"]["name"];
$vm = $_FILES["vm"]["name"];

if (empty($title) or empty($description)){
	header("Location: ../edit_lesson.php?id=$id&err=nofill");
	die();
}

include_once('../../includes/database.php');

if (!empty($video) or !empty($vm)){
	if($stmt = $mysqli -> prepare("SELECT video, vm FROM lessons WHERE lesson_id = ?")) {
      $stmt -> bind_param("s", $id);
      $stmt -> execute();
      $stmt -> bind_result($old_video, $old_vm);
      $stmt -> fetch();
      $stmt -> close();
	}
	
	$lesson_path = "../../lessons/$lesson_id";
}


if (!empty($video)){
	unlink("../../lessons/$id/$old_video");
	
	$lesson_path = $lesson_path . basename( $_FILES['video']['name']); 
	if(move_uploaded_file($_FILES['video']['tmp_name'], $lesson_path)) {
	} else{
    	echo "<p>There was an error uploading the video, please try again. Contact a David!</p>";
	}
	
}

if (!empty($vm)){
	unlink("../../lessons/$id/$old_vm");
	
	$lesson_path = $lesson_path . basename( $_FILES['vm']['name']); 
	if(move_uploaded_file($_FILES['vm']['tmp_name'], $lesson_path)) {
	} else{
    	echo "<p>There was an error uploading the vm, please try again. Contact a David!</p>";
	}
	
}

if($stmt = $mysqli -> prepare("UPDATE lessons SET title=?, description=? WHERE lesson_id=? ")) {
      $stmt -> bind_param("sss", $title, $description, $id);
      $stmt -> execute();
      $stmt -> fetch();
      $stmt -> close();
	}

if (isset($video)){
	if($stmt = $mysqli -> prepare("UPDATE lessons SET video=? WHERE lesson_id = ?")) {
      $stmt -> bind_param("ss", $video, $id);
      $stmt -> execute();
      $stmt -> fetch();
      $stmt -> close();
	}
}

if (isset($vm)){
	if($stmt = $mysqli -> prepare("UPDATE lessons SET vm=? WHERE lesson_id = ?")) {
      $stmt -> bind_param("ss", $vm, $id);
      $stmt -> execute();
      $stmt -> fetch();
      $stmt -> close();
	}
}

$mysqli -> close();

header('Location: ../index.php');
?>