<?php
include("adminsession.php");
include("conn.php");
$id = intval($_GET['id']); //intval — Get the integer value of a variable
$result = mysqli_query($con,"SELECT * FROM game WHERE Game_ID=$id");
while($row = mysqli_fetch_array($result))
{
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Game</title>

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
		
		body{
			background-color: #fafafa;
			font-family: 'Open Sans', sans-serif;
		}
		
		h2{
			text-align: center;
			text-decoration: underline;
			font-size: 40px;
		}
		h3{
			text-align: center;
			font-size: 30px;
		}
		input:focus:valid {
			background-color: green;
		}
		input:focus:invalid {
			background-color: red;
		}
		textarea:focus:valid {
			background-color: green;
		}
		textarea:focus:invalid {
			background-color: red;
		}
		
		input[type=text], input[type=tel], input[type=email], textarea, input[type=date], select{
			width:200px;
		}
		.label {
            color:blue;
            font-size: 20px;
        }
		.centerbox {
        	display: flex;
        	align-items: center;
            justify-content: center;
            font-family: 'Yanone Kaffeesatz', sans-serif;
            position: static;
        }
		input[type=text],input[type=number]{
            font-size:20px;
            height: 20px;
            width: 500px;
        }
		select{
			font-size:20px;
			height:25px;
			width: 510px;
		}
		input[type=file]{
			width:510px;
			font-size:20px;
		}
		.container{
			margin-left: 5px;
			width: 550px;
			height: 900px;
			border: 1px solid #ddd;
			background-color: #ffffff;
			padding: 25px;
		}
		input[type=submit],input[type=button]{
			width:100px;
            font-size: 18px;    
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px;
        }
		input[type=submit]:hover,input[type=button]:hover{
			background-color: #111;
		}
		#file-ip-1-preview,.preview{
			height:100px;
			width: 100px;
		}
	</style>
</head>
<body>
	<?php
		//include("navbar_admin.php");
	?>
	<h2>Edit Game Details</h2>

	<div class="centerbox">
		<form action="updategame.php" method="post" enctype="multipart/form-data">
		<input type="hidden" name="Game_ID" value="<?php echo $row['Game_ID'] ?>">
		<div class="container">
			<h3>Game</h3>
			<hr>
			<p>Edit the information below and press submit.</p>
			<div class="section">
				<div class="label">
                    Title :
				</div>
				<div class="field">
					<input type="text" value="<?php echo $row['Title'] ?>" name="Title" maxlength="50" required="required">
				</div>
			</div>
			<br>
            <div class="section">
					<div class="label">
						Video Game Console :
					</div>
                    <div class="field">
					<select name="Video_Game_Console" required="required">
					<option value="">Please select</option>

					<option
					<?php if ($row['Video_Game_Console'] == "Computer") { ?>
							selected="selected"
					<?php } ?>
					value="Computer">Computer</option>

					<option 
					<?php if ($row['Video_Game_Console'] == "PS4") { ?>
							selected="selected"
					<?php } ?>
					value="PS4">PS4</option>

					<option 
					<?php if ($row['Video_Game_Console'] == "PS5") { ?>
							selected="selected"
					<?php } ?>
					value="PS5">PS5</option>

					<option 
					<?php if ($row['Video_Game_Console'] == "XBOX") { ?>
							selected="selected"
					<?php } ?>
					value="XBOX">XBOX</option>

					<option 
					<?php if ($row['Video_Game_Console'] == "Other") { ?>
							selected="selected"
					<?php } ?>
					value="Other">Other</option>
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

						foreach ($con->query($SQLG) as $prow){//Array or records stored in $row

							echo "<option value=$prow[Publisher_ID]>$prow[Publisher_Name]</option>"; 

							/* Option values are added by looping through the array */ 

						}

						echo "</select>";

						?>
					</div>
			</div>
            <br>
            <div class="section">
				<div class="label">
					Price (RM) :
				</div>
				<div class="field">
					<input type="number" min="1" step="any" name="Price" value="<?php echo $row['Price'] ?>" required="required">
				</div>
			</div>
            <br>
			<div class="section">
				<div class="label">
					Quantity :
				</div>
				<div class="field">
					<input type="number" value="<?php echo $row['Quantity'] ?>" name="Quantity" min="1" required="required">
				</div>
			</div>			
			<br>
			<div class="section">
				<div class="label">
					Description :
				</div>
				<div class="field">
					<input type="text" value="<?php echo $row['Description'] ?>" maxlength="255" name="Description">
				</div>
			</div>
			<br>
			<div class="section">
			<input type="hidden" name="current_pic_name" value="<?php echo $row['Game_Pic']?>">
				<div class="label">
					Upload Image :
				</div>
				<div class="field">
				<input type="file" id="file-ip-1" required="required" name="Game_Pic" accept="image/png, image/jpg, image/jpeg" onchange="showPreview(event);">
					<div class="label">
						<br>Image Preview :
					</div>
					<div class="preview">	
						<br><img id="file-ip-1-preview">
					</div>
				</div>
			</div>
			<br>
			<?php
				if(isset($_POST["submit"])) {
					$check = getimagesize($_FILES["Game_Pic"]["tmp_name"]);
					if($check !== false) {
					$uploadOk = 1;
					} else {
					echo "This file is not an image. Please reupload again.";
					$uploadOk = 0;
					}
				}
			?>
			<div class="section">
				<div class="label">
					&nbsp;
				</div>
				<div class="field">
					<input type="submit" value="Submit" name="submit"> 
					<a href="viewgamee.php">
						<input type="button" value="Return">
					</a>
				</div>
			</div>
		</div>
	</div>
	</form>

	<?php
	}
	mysqli_close($con);
	?>

</body>
</html>