<?php
session_start();
if (!isset($_SESSION['customersession']))
{
  echo "<script>alert('Please Login!');
   window.location.href='login.php';</script>";
}
?>