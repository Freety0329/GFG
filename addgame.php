<?php
	//include("adminsession.php");
 	if (isset($_POST['submitBtn'])) {
	include("conn.php");

	// To set the folder, file name and file type
	$target_dir = "uploadg/";
	$target_file = $target_dir . basename($_FILES["Game_Pic"]["name"]);

	if (move_uploaded_file($_FILES["Game_Pic"]["tmp_name"], $target_file)) 

	{
		//To get file name
		$file_name = basename($_FILES["Game_Pic"]["name"]);


		$sql="INSERT INTO game (Title, Video_Game_Console, Publisher, Price, Quantity, Description, Game_Pic) VALUES 
        ('$_POST[Title]','$_POST[Video_Game_Console]','$_POST[Publisher]','$_POST[Price]','$_POST[Quantity]','$_POST[Description]','$_POST[Game_Pic]','$file_name')";
		
		

		if (!mysqli_query($con,$sql)){
			die('Error: ' . mysqli_error($con));
		} 
		else 
		{
			echo '<script>alert("A new game is added.");
			window.location.href= "viewgamee.php";
			</script>';
		}
	}

 }
?>
<!DOCTYPE html>
<html>
<head>
	<title>Add Game Details</title>
	<script>
	function showPreview(event){
	if(event.target.files.length > 0){
		var src = URL.createObjectURL(event.target.files[0]);
		var preview = document.getElementById("file-ip-1-preview");
		preview.src = src;
		preview.style.display = "block";
	}
	}
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
	<?php
		//include("navbar_admin.php");
	?>
	<br>
	<h1>Add New Game</h1>
	<br>
	<div class="centerbox">
		<div class="container">
		<h3>Game</h3>
		<hr>
		<p>Fill in the game information below and submit.</p>
			<form action="insertg.php" method="post" enctype="multipart/form-data">
				<div class="section">
					<div class="label">
                        Title :
					</div>
					<div class="field">
						<input type="text" name="Title" required="required">
					</div>
				</div>
				<br>
				<div class="section">
					<div class="label">
						Video Game Console :
					</div>
					<div class="field" >
						<select name="Video_Game_Console" required="required">
						<option value="">Please select</option>
						<option value="Computer">Computer</option>
						<option value="PS4">PS4</option>
						<option value="PS5">PS5</option>
						<option value="XBOX">XBOX</option>
						<option value="Other">Other</option>
						</select>		
					</div>
				</div>
				<br>
				
				<div class="section">
					<div class="label">
						Publisher :
					</div>
					<div class="field" >
						<select name="Publisher_ID" required="required">

						<?php
						include("conn.php");
						$SQLG="select Publisher_Name, Publisher_ID from publisher order by Publisher_Name";				

						//echo "<select name=publisher value=''>Publisher Name</option>"; // list box select command

						foreach ($con->query($SQLG) as $row){//Array or records stored in $row

							echo "<option value=$row[Publisher_ID]>$row[Publisher_Name]</option>"; 

							/* Option values are added by looping through the array */ 

						}

						echo "</select>";

						mysqli_close($con);


						?>
					</div>
				</div>
                <br>
				<div class="section">
					<div class="label">
						Price (RM) :
					</div>
					<div class="field">
						<input type="number" min="1" step="any" name="Price" required="required">
					</div>
				</div>

				<br>

				<div class="section">
					<div class="label">
						Quantity :
					</div>
					<div class="field">
						<input type="number" name="Quantity" required="required">
					</div>
				</div>

				<br>
				<div class="section">
					<div class="label">
						Description :
					</div>
					<div class="field">
						<input type="text" name="Description">
					</div>
				</div>
				<br>
				<div class="section">
					<div class="label">
						Upload Game Image :
					</div>
					<div class="field">
					<input type="file" id="file-ip-1" name="Game_Pic" required="required" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event);">
					<div class="label">
						<br>Image Preview :
					</div>
					<div class="preview">
						<br><img id="file-ip-1-preview">
					</div>
				</div>
				<br>
				<?php
					if(isset($_POST["submitBtn"])) {
						$check = getimagesize($_FILES["Game_Pic"]["tmp_name"]);
						if($check !== false) {
						$uploadOk = 1;
						} else {
						echo "This file is not an image. Please reupload again.";
						$uploadOk = 0;
						}
					}
				?>
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