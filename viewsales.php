<html>
<?php
include("navbaradmin.php");
	?>
<head>
<style>
.parentbox {
  display: flex;
  flex-wrap: wrap;
}
.childbox {
  /*
  flex: flex-grow flex-shrink flex-basis;
  flex-grow 	A number specifying how much the item will grow relative to the rest of the flexible items
  flex-shrink 	A number specifying how much the item will shrink relative to the rest of the flexible items
  flex-basis 	The length of the item. Legal values: "auto", "inherit", or a number followed by "%", "px", "em" or any other length unit
  */
  flex: 0 0 350px;
  margin: 10px;
  min-height: 475px;
  background-color: #fafafa;
  border-radius: 10px;
  border: #d4d4d4 solid 2px;
  padding: 10px;
}
input {
	border: 3px outset #e6e6e6;
	border-radius: 5px;
}

.button1 {

	color: white;
	border: none;
	background-color: #333;
  	border-radius: 20px;
	height: 40px;
	width: 80px;
}
.searchbox {
	margin: 0 auto;
	display: block;
	float: initial;
	
}


.delete button{
	background-color: black;
	font-size: 10px;
	color: white;
	border: 3px solid black;
	border-radius: 5px;
	outline: none;
	cursor: pointer;
}
</style>
</head>
<body>


<div class="searchbox" style="width:40%">
<form method="post">
	<input type="text" style="width: 500px; padding: 8px; margin: 3px 0 11px 0; display: inline-block; font-size:12pt;" name="search_key"> <button class="button1" name="searchBtn" type="submit">Search</button>
</form>
</div>

<div style="width:50%; float: left">
</div>
</div>
<div class="field" style="width: fit-content; margin: 0 auto;">
					<a href="adminpage.php">
						<input type="button" value="Return">
					</a>
</div>
<?php
include("conn.php");

$search_key = "";

if(isset($_POST['searchBtn'])){
	$search_key = $_POST['search_key'];
}

$result=mysqli_query($con,"select * from game_cart where Cart_ID like '%$search_key%'");
?>
<div class="parentbox">


<?php 
	while($row=mysqli_fetch_array($result)){

        $contact_pic = "default.jpg";
		if ($row['Game_Pic']!=""){
			$contact_pic = $row['Game_Pic'];
		}

			$pid = intval($row['Cart_ID']);
			$pq="SELECT * FROM game_cart where Cart_ID = '$pid'";
			$pdata=$con->query($pq);
			$pdata=$pdata->fetch_array()['Account_ID'];
		
		
		$data = '<div class="childbox">

        <img src="uploadg/'.$contact_pic.'" width="100" height="100" style="display: block;
		margin-left: auto;
		margin-right: auto; border-radius:10%;">
				
		<h3>'.$row['Cart_ID'].'</h3>

        Account ID:<br>'.$row['Account_ID'].'<br><br>
		
		Total Price:<br>'.$row['Total_Price'].'<br><br>
				
		Title:<br>'.$row['Title'].'<br><br>

        Game ID:<br>'.$row['Game_ID'].'<br><br>
		
		Quantity:<br>'.$row['Quantity'].'<br><br>

        Date of Purchase:<br>'.$row['Date_of_purchase'].'<br><br>
		
		<a class="delete" onclick="return confirm(\'Delete '.$row['Cart_ID'].' record?\');" href="deletegamecart.php?id='.$row['Cart_ID'].'"><button>Delete</button></a> 
		
		</div>
		';
		
		echo $data;
		
		} 
		mysqli_close($con);//to close the database connection
?>
</div>
</body>
</html>