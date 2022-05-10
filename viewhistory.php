<?php
//print out order history

    include("conn.php");
    include("navbar.php");
?>
<html>
<head>
    <title>View Purchase History</title>
    <style>
        body {
            background-color: #fafafa;
            font-family: sans-serif;
            margin: 0px;
        }

        .centerbox { 
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            font-family: 'Yanone Kaffeesatz', sans-serif;
            position: static;
        }

        .productbox {
            display: flex;
            margin: 20px 0px 0px 100px;
            width: 750px;
            height: 170px;
            border: 1px solid #ddd;
            background-color: #ffffff;
            border-radius: 2px;
        }

        .productinfo, .pricebox {
            font-size: 18px;
            margin: 25px;
        }

        .productinfo {
            margin-right: 50px;
        }

        .image {
            padding: 20px;
        }
        h1{
            text-decoration: underline;
        }
    </style>
</head>
<body>

<?php


$orderinfo=mysqli_query($con,"SELECT game.Title, game.Game_Pic, game_cart.Quantity, game_cart.Date_Of_purchase, game.Price 
FROM game_cart 
INNER JOIN game 
ON game_cart.Game_ID = game.Game_ID 
WHERE game_cart.Account_ID =".$_SESSION['Account_ID']);
?>
<h1 align="center">Purchase History</h1>
<div class="centerbox">
<?php 
    if (mysqli_num_rows($orderinfo) !== 0) {
        while($row=mysqli_fetch_array($orderinfo)){

            $total = '<div class="productbox">
            <img src="uploadg/'. $row['Game_Pic'] .'" alt="" class="image" style="width: 120px;height: 120px;">
            <div class="productinfo">
            <b font style="font-size: 24px">'.$row['Title'].'</b> &nbsp;&nbsp;&nbsp;<small><i>'.$row['Date_Of_purchase'].'</i></small><br><br>
            
            Quantity: '.$row['Quantity'].'<br><br>

            </div>
            <div class="pricebox">

            <br><br>
            Unit Price: RM'.sprintf("%0.2f",$row['Price']).'
            <br><hr><br>
            <b>Total Price: RM' .sprintf("%0.2f",$row['Quantity'] * $row['Price']).'</b>

            </div>
            </div>';

            echo $total;
            

            } 
            mysqli_close($con);//to close the database connection
    }
    else {
        echo "<div class='empty'>No order has been made</div>";
    }
?>
</div>
</body>
</html>