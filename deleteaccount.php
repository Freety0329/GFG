<?php
include("adminsession.php");
include("conn.php");

$id=intval($_GET['id']);

$test=mysqli_query($con,"select * FROM account WHERE Account_ID=$id");
$test=$test->fetch_array()['User_Type'];

if ($test=='Admin'){
echo '
<script>
alert("Admin account is not allowed to be delete!");
window.history.back();
</script>';
}
else{


$result=mysqli_query($con,"DELETE FROM account WHERE Account_ID=$id");

mysqli_close($con);
header('Location: viewaccounte.php');
}
?>