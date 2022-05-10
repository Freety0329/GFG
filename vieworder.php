<!DOCTYPE html>
<html>
<head></head>
<style>
    body {
        background-color: #fafafa;
    }

    .order {
    display: grid; 
    grid-template-columns: 1fr 1fr;

    flex: 0 0 350px;
    width: 60%;
    margin: 10px auto;
    height: 200px;
    background-color: #ffffff;
    border-radius: 10px;
    border: #d4d4d4 solid 2px;
    padding: 10px;
    }

    .oDate {
        justify-self: end;
    }

    .Price {
        align-self: end;
        justify-self: end;
    }
    .dDate {
        align-self: end;
    }
    .empty {
        margin: 0 auto;
        width: fit-content;
    }
</style>
<?php
    include "navbar.php";
    include "conn.php";
    include "connection.php";
    //$customerdata = $mysqli-> query("SELECT * from receipt where Member_ID ='".$_SESSION['Account_ID'] . "'");
    //$cusinfo = $customerdata->fetch_assoc(); 
    $result=mysqli_query($con,"SELECT * FROM game_cart WHERE Account_ID = '".$_SESSION['Account_ID']."'");
    echo '<br><br>';
	if (mysqli_num_rows($result) !== 0) {

        while($row=mysqli_fetch_array($result)){
            echo '<div class="order">
            <div class="ID">Receipt ID: <b>'.$row['Cart_ID'].'</b><br></div>
            <div class="oDate">    
            Order Date: <b>'.$row['Date_of_purchase'].'</b><br></div>
            <div class="dDate">
            Status: <b>Processing</b> <br><br>
            Your order will be deliver on this date<br><br>
            Delivery Date: <b>'.$row['Date_of_delivery'].'</b><br></div>
            <div class="Price">Total Price: <span style="font-size: 2rem; color: rgb(167, 0, 0);"><b>'.$row['Total_Price'].'</b></span></div>
            </div>
            ';
        }
    }
    else {
        echo "<div class='empty'>No order has been made</div>";
    }

?>

</html>
