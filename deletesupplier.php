<?php
include("adminsession.php");
include("conn.php");

$id=intval($_GET['id']);

$test=mysqli_query($con,"select * FROM publisher WHERE Publisher_ID=$id");
$result=mysqli_query($con,"DELETE FROM publisher WHERE Publisher_ID=$id");

mysqli_close($con);
header('Location: viewsupplier.php');
?>