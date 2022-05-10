<?php
//include("customersession.php");
include("conn.php");

$id=intval($_GET['id']);

$result=mysqli_query($con,"DELETE FROM game WHERE Game_ID=$id");

mysqli_close($con);
header('Location: viewgamee.php');
?>