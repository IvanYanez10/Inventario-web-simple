<?php
  ob_start();
  session_start();

  unset($_SESSION["username"]);

  header("Location: http://localhost/login.php");
  ob_end_flush();
?>
