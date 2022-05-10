<?php
	include("navbar.php");

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<title>Shopping Cart</title>
	<style>
		body {
			font-family: sans-serif;
			margin: 0px;
			background-color: #fafafa;
		}

		.quantityBtn {
			height: 27px;
			width: 27px;
			border-radius: 2px;
			border: 1px solid black;
		}

		.quantityDisplay {
			height: 23px;
			width: 30px;
			border-radius: 2px;
			border: 1px solid black;
			text-align: center;
		}

		.flexbox { 
			float: left;
		}

		.productbox {
			display: flex;
			margin: 20px 0px 0px 100px;
            width: 700px;
            height: 170px;
            border: 1px solid #ddd;
            background-color:#ffffff;
			border-radius: 2px;
		}

		.productinfo, .quantitybox {
			font-size: 18px;
			margin: 25px;
		}

		.productinfo {
			margin-right: 50px;
		}

		.delete {
			font-size: 18px;
			text-decoration: none;
			color: #000000;
			padding: 5px 10px;
			text-align: center;
			border-radius: 5px;
			background-color: #db5e5e;
		}

		.delete:hover {
			background-color: #b34747;
		}

		.checkoutbox {
			float: right;
			margin-right: 100px;
            width: 500px;
            height: 300px;
			padding: 20px;
            border: 1px solid #ddd;
            background-color: #ffffff;
			border-radius: 2px;
			font-size: 18px;
		}

		.image {
			padding: 20px;
		}
		.checkout{
			text-decoration: none;
			width:100px;
            font-size: 18px;    
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px;
		}
		.checkout:hover{
			background-color: #111;
		}
		.msg{
			font-weight: bold;
			margin-left: 50px;
			font-size:20px;
		}
		h1 {
            text-decoration: underline;
            font-size: 30px;
        }
	</style>
	<script>
		function confirmDelete(id) {
			if(confirm('Are you sure you want to remove this game from cart?')) {
				window.location.href='deletecart.php?id=' + id;
			}
		}
	</script>
</head>
<body>   
	<?php
		//include("navbar_logged_in.php");
		include("conn.php");

		$cartinfo=mysqli_query($con,
		"SELECT game.Title, game.Game_Pic, cart_item.CQuantity, game.Quantity, game.Price, cart_item.Cart_Item_ID, cart_item.Account_ID
		FROM game 
		inner JOIN cart_item 
		ON game.Game_ID = cart_item.Game_ID
		inner JOIN account
		ON cart_item.Account_ID = account.Account_ID
		WHERE account.Account_ID = ".$_SESSION['Account_ID']);

		if(isset($_POST["quantityInc"])){
			$newQuantity = intval($_POST["cquantity"]) + 1;
			$cartid  = $_POST["shopping_cart_item_id"];
			if($newQuantity > $_POST["quantity"]) {
				echo '<script>alert("You have reach the maximum quantity.")</script>';
			} else {
				$sql = "UPDATE cart_item 
				SET CQuantity=$newQuantity 
				WHERE Cart_Item_ID=$cartid;";

				if (mysqli_query($con, $sql)) {
				mysqli_close($con);
				echo "<script>window.location.href='cart.php';</script>";
				}
			}
		}

		if(isset($_POST["quantityDec"])){
			$newQuantity = intval($_POST["cquantity"]) - 1;
			$cartid  = $_POST["shopping_cart_item_id"];
			if($newQuantity <= 0) {
				echo '<script>','confirmDelete('.$cartid.');','</script>';
			} else {
				$sql = "UPDATE cart_item 
				SET CQuantity=$newQuantity 
				WHERE Cart_Item_ID=$cartid;";

				if (mysqli_query($con, $sql)) {
				mysqli_close($con);
				echo "<script>window.location.href='cart.php';</script>";
				}
			}
		}
	?>
	<h1 style="margin-top: 50px; margin-left: 100px;">My Cart</h1> 
	<div class="flexbox">
	<?php 
	$total_price = 0;
	$count = 0;

	if (mysqli_num_rows($cartinfo) == 0) {
		echo "<div class='msg'>Cart is empty.</div>";
		echo "<style>a.checkout { pointer-events: none; cursor: default; }</style>";

	} else {
		while($row=mysqli_fetch_array($cartinfo)){
		
			$cartproduct = '<div class="productbox">
			<img src="uploadg/'. $row['Game_Pic'] .'" alt="" class="image" style="width: 120px;height: 120px;" >
			<div class="productinfo">
			<b font style="font-size: 24px">'.$row['Title'].'</b><br><br>
			
			Unit Price: RM'.sprintf("%0.2f",$row['Price']).'<br><br>
	
			<form method="POST">
			<input type="hidden" name="shopping_cart_item_id" value="'.$row['Cart_Item_ID'].'">
			<input type="hidden" name="quantity" value="'.$row['Quantity'].'">
			<a class="delete" href="deletecart.php?id='.$row['Cart_Item_ID'].'" onclick="return confirm(\'Are you sure you want to remove this from the cart?\');">Delete</a>
			</div>
			<div class="quantitybox">
	
			<br><br>
			<button class="quantityBtn" name="quantityDec"><i class="fa fa-minus" aria-hidden="true"></i></button>&nbsp;
			<input type="text" class="quantityDisplay" name="cquantity" value="'.$row['CQuantity'].'" readonly>&nbsp;
			<button class="quantityBtn" name="quantityInc"><i class="fa fa-plus" aria-hidden="true"></i></button>&nbsp;&nbsp;'.$row['Quantity'].' unit available
			</form>
	
			</div>
			</div>';
	
			echo $cartproduct;
			
			$price = $row['Price'] * $row['CQuantity'];
			$total_price += $price;
			$count += $row['CQuantity'];
		} 
	}
	?>
	</div>
	<?php
	$checkout = '<div class="checkoutbox">

	<b>PRICE DETAILS</b><hr><br>

	Items: <b>'.$count.'</b><br><br>
	Delivery Fee: <b>FREE</b><br><br><hr>
	
	Total Price: <b>RM'.sprintf("%0.2f",$total_price).'</b><br><br><br>
	<a class="checkout" href="checkout.php?id='.$_SESSION['Account_ID'].'" onclick="return confirm(\'Are you sure you want to checkout? \');">Checkout</a>
	</div>';
	echo $checkout;
	mysqli_close($con);
	?>
</body>
</html>