<?php

  ob_start();
  session_start();
  if(isset($_SESSION['user_id'])) {
    
    unset($_SESSION['user_id']);
    unset($_SESSION['user_fullname']);
    unset($_SESSION['user_username']);
    unset($_SESSION['user_password']);
    unset($_SESSION['user_phone']);
    
    session_destroy();
    header("Location: login.php");
  } else {
    header("Location: ./index.php");
  }

?> 