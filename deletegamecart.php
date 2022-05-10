<?php
//include("customersession.php");
include("conn.php");

$id=intval($_GET['id']);

$test=mysqli_query($con,"select * FROM game_cart WHERE Cart_ID=$id");
$result=mysqli_query($con,"DELETE FROM game_cart WHERE Cart_ID=$id");

mysqli_close($con);
header('Location: viewsales.php');
?>