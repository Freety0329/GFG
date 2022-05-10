<?php
//include("adminsession.php");
include("conn.php");
//$sql="INSERT INTO product (Product_Name, Quantity, Price, Brand, Description, Category, Supplier)
//VALUES
//('$_POST[Product_Name]','$_POST[Quantity]','$_POST[Price]','$_POST[Brand]','$_POST[Description]','$_POST[Category]','$_POST[Supplier]')";

$target_dir = "uploadg/";
	$target_file = $target_dir . basename($_FILES["Game_Pic"]["name"]);

	if (move_uploaded_file($_FILES["Game_Pic"]["tmp_name"], $target_file)) 

	{
		//To get file name
		$file_name = basename($_FILES["Game_Pic"]["name"]);


		$sql="INSERT INTO game 
        (Title, Video_Game_Console, Publisher_ID, Price, Quantity, Description, Game_Pic) VALUES 
        ('$_POST[Title]','$_POST[Video_Game_Console]','$_POST[Publisher_ID]','$_POST[Price]','$_POST[Quantity]','$_POST[Description]','$file_name')";
		
		

		if(!mysqli_query($con,$sql)) {
            die('Error: '.mysqli_error($con));
        }
        else {
            echo '<script>alert("A new game is added");
            window.location.href= "viewgamee.php";
            </script>';
        }
	}

mysqli_close($con);
?>