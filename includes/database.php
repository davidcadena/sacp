<?php

    $mysqli = new mysqli('127.0.0.1', 'husky', '7amurafrU7amurafrU7amurafrU', 'sacp');

   if(mysqli_connect_errno()) {
      echo "Connection Failed: " . mysqli_connect_errno();
      exit();
   }

?>
