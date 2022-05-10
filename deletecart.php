<?php
//include("customersession.php");
include("conn.php");

$id=intval($_GET['id']);

$result=mysqli_query($con,"DELETE FROM Cart_Item WHERE Cart_Item_ID=$id");

mysqli_close($con);
header('Location: cart.php');
?>