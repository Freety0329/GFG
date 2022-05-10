<?php
include("customersession.php");
include("conn.php");

        $productid=intval($_GET['id']);

        $memberid = $_SESSION['Account_ID'];

		$sql="INSERT INTO review (Rating, Review, Game_ID, Account_ID) values ('$_POST[Rating]','$_POST[Review]','$_POST[Game_ID]','$_POST[Account_ID]')";
		

		if(!mysqli_query($con,$sql)) {
            die('Error: '.mysqli_error($con));
        }
        else {
            echo '<script>alert("A comment is added");
            window.location.href= "detail.php";
            </script>';
        }
	
mysqli_close($con);
?>