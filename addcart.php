<?php
include("customersession.php");
include("conn.php");

$productid=intval($_GET['id']);

$memberid = $_SESSION['Account_ID'];

$cart=mysqli_query($con,"SELECT * FROM Cart_Item WHERE Game_ID = $productid AND Account_ID = $memberid");
if (mysqli_num_rows($cart) == 1) {
    mysqli_close($con);
    echo '<script>alert("The game is already in the cart.");
    window.location.href="cart.php";</script>'; //membercatalog.php
}

$checkquantity=mysqli_query($con,"SELECT Quantity FROM game WHERE Game_ID = $productid");

$row=mysqli_fetch_array($checkquantity);

if ($row['Quantity'] > 0) {
    $addcart="INSERT INTO Cart_Item(Account_ID,Game_ID,cQuantity) VALUES('$memberid','$productid','1')";
    if (!mysqli_query($con,$addcart)){
        die('Error: ' . mysqli_error($con));
    } else {
        mysqli_close($con);
        echo '<script>alert("A game is added to the cart.");
        window.location.href="membercatalog.php";</script>'; //membercatalog.php
    }
} else {
    mysqli_close($con);
    echo '<script>alert("Currently this game is out of stock. Please wait for arrival of new stock");
    window.location.href="membercatalog.php";</script>';
}
?>