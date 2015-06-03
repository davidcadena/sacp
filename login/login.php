<?php

include_once'../includes/database.php';

$email = $_POST['email'];
$raw_password = $_POST['password'];

if($stmt = $mysqli -> prepare("SELECT password, salt, user_id, user_level FROM users WHERE email=?")) {
      $stmt -> bind_param("s", $email);
      $stmt -> execute();
      $stmt -> bind_result($password, $salt, $user_id, $user_level);
      $stmt -> fetch();
      $stmt -> close();
      $mysqli->close();
}
      
    $sub_password = hash('sha512',$salt.$raw_password);
      
if ($sub_password == $password){
    session_start();
    $_SESSION['user_id'] = $user_id;
    $_SESSION['user_level'] = $user_level;
    
    switch ($user_level) {
    case "admin":
        header("Location: ../admin/index.php");
        break;
    case "coach":
        header("Location: ../coach/index.php");
        break;
    case "student":
        header("Location: ../student/index.php");
        break;
	}
    
    die();
}

header("Location: index.php?err=wrong");

?>