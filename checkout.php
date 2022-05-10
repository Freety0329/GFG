<?php
include("customersession.php");
include("conn.php");

$id=intval($_GET['id']);

date_default_timezone_set("Asia/Kuala_Lumpur");

$cart=mysqli_query($con,"SELECT cart_item.*, game.* FROM cart_item INNER JOIN game ON cart_item.Game_ID = game.Game_ID WHERE Account_ID = $id");

while($row=mysqli_fetch_array($cart)){
    $memberid = $row['Account_ID'];
    $productid = $row['Game_ID'];
    $productpic = $row['Game_Pic'];
    $productname = $row['Title'];
    $price = $row['Price'];
    $cquantity = $row['CQuantity'];
    $quantity = $row['Quantity'];
    $order = "INSERT INTO game_cart(Account_ID,Game_ID,Game_Pic,Title,Total_Price,Quantity) VALUES('$memberid','$productid','$productpic','$productname','$price','$cquantity')";
    // $order = "INSERT INTO receipt(Member_ID,Total_Price,Date_of_delivery) VALUES('$memberid','$price', CURRENT_DATE() + 2)";

    $newquantity = $quantity - $cquantity;
    echo $newquantity;

    $updatequantity="UPDATE game SET Quantity = '$newquantity' WHERE Game_ID = $productid";
    mysqli_query($con,$updatequantity);
}

if (!mysqli_query($con,$order)){
    die('Error: ' . mysqli_error($con));

} else {
    $deletecart=mysqli_query($con,"DELETE FROM cart_item WHERE Account_ID=$id");
    mysqli_close($con);
    echo '<script>alert("Successful!");
    window.location.href="membercatalog.php";</script>'; //memberpage.php
}
   
?>