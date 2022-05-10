<?php
//include("adminsession.php");
include("conn.php");


		$sql="INSERT INTO publisher (Publisher_Name, Publisher_Address, Publisher_Telephone, Publisher_Email) 
        VALUES ('$_POST[Publisher_Name]','$_POST[Publisher_Address]','$_POST[Publisher_Telephone]','$_POST[Publisher_Email]')";
		

		if(!mysqli_query($con,$sql)) {
            die('Error: '.mysqli_error($con));
        }
        else {
            echo '<script>alert("A new publisher is added");
            window.location.href= "viewsupplier.php";
            </script>';
        }
	
mysqli_close($con);
?>