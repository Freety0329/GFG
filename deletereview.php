<?php
include("customersession.php");
include("conn.php");

$productid=intval($_GET['id']);

$memberid = $_SESSION['Account_ID'];
$result=mysqli_query($con,"DELETE FROM review WHERE Account_ID=$memberid and Game_ID=$productid");

mysqli_close($con);
header('Location: "mdetail.php?id='.$productid.'"');
?>