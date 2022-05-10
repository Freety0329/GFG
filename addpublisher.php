<?php
 	if (isset($_POST['submitBtn'])) {
	include("conn.php");

    $checkuser=mysqli_query($con,"SELECT Publisher_Name FROM Publisher WHERE Publisher_Name='$_POST[Publisher_Name]'");

    if (mysqli_num_rows($checkuser) == 1) {
        echo '<script>alert("This name is already registered. Please use another name."); </script>';
    
    } else {
        $userinfo="INSERT INTO publisher (Publisher_Name, Publisher_Address, Publisher_Telephone, Publisher_Email) VALUES ('$_POST[Publisher_Name]','$_POST[Publisher_Address]','$_POST[Publisher_Telephone]','$_POST[Publisher_Email]','$file_name')";

        if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		} else {
			echo '<script>alert("A new publisher is added.");
			window.location.href= "viewpublisher.php";
			</script>';
		}
    mysqli_close($con);
}

	 }
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Publisher</title>
	<script>

	</script>
	<style>
		body {
			background-color: #fafafa;
			font-family: 'Open Sans', sans-serif;
		}
		input:focus:valid {
			background-color: #90EE90;
		}
		input:focus:invalid {
			background-color: #ffcccb;
		}
		textarea:focus:valid {
			background-color: #90EE90;
		}
		textarea:focus:invalid {
			background-color: #ffcccb;
		}
		.centerbox {
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: 'Yanone Kaffeesatz', sans-serif;
			position: static;
		}
		.container{
            margin-left: 5px;
            width: 550px;
            height: 900px;
            border: 1px solid #ddd;
            background-color: #ffffff;
            padding: 25px;
        }
		.label {
            color:blue;
            font-size: 20px;
        }
		input[type=text],input[type=number]{
            font-size:20px;
            height: 20px;
            width: 500px;
        }
		select{
			font-size:20px;
			height: 25px;
            width: 510px;
		}
		input[type=file]{
			font-size: 20px;
		}
		input[type=submit],input[type=reset] {
            font-size: 18px;    
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px;
			width: 100px;
        }
		input[type=submit]:hover,input[type=reset]:hover{
			background-color: #111;
		}
		h3{
			font-size: 30px;
			text-align: center;
		}
		#file-ip-1-preview,.preview{
			height:100px;
			width: 100px;
		}
		h1 {
            text-decoration: underline;
            text-align: center;
            font-size: 30px;
        }
	</style>
</head>
<body>
	<!-- <?php
		include("navbar_staff.php");
	?> -->
	<br>
	<h1>Add New Publisher</h1>
	<br>
	<div class="centerbox">
		<div class="container">
		<h3>Publisher Details</h3>
		<hr>
		<p>Fill in the Publisher details below and submit.</p>
			<form action="insertp.php" method="post" enctype="multipart/form-data">
				<div class="section">
					<div class="label">
						Publisher Name :
					</div>
					<div class="field">
						<input type="text" name="Publisher_Name" required="required">
					</div>
				</div>
				<br>
				<div class="section">
					<div class="label">
						Publisher Address :
					</div>
					<div class="field">
						<input type="text" name="Publisher_Address" required="required">
					</div>
				</div>
				<br>
				<div class="section">
					<div class="label">
						Publisher Telephone :
					</div>
					<div class="field">
						<input type="number" maxlength="10" name="Publisher_Telephone" required="required">
					</div>
				</div>
				<br>
				
				<div class="section">
					<div class="label">
						Publisher Email :
					</div>
					<div class="field">
						<input type="email" name="Publisher_Email" required="required">
					</div>
				</div>
				<br>
				<div class="section">
					<div class="label">
						&nbsp;
					</div>
					<div class="field">
						<input type="submit" value="Submit" name="submitBtn"> 
						<input type="reset" value="Reset">
					</div>
				</div>
			</form>
		</div>
	</div>
</body>
</html>