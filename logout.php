<?php
  session_start();
  session_destroy();
  echo '<script>alert("You are Logged out successfully")</script>';
  echo "<script>window.open('login.html')</script>";
?>