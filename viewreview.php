<!DOCTYPE html>
<html>
<head></head>
<style>
    body {
        background-color: #fafafa;
    }

    .order {
    
    

    flex: 0 0 350px;
    width: 60%;
    margin: 10px auto;
    min-height: 200px;
    background-color: #ffffff;
    border-radius: 10px;
    border: #d4d4d4 solid 2px;
    padding: 10px;
    }
    .nameedit {
        margin: 15px auto;
        width: fit-content;

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

    .formbuttons {
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
    $result=mysqli_query($con,"SELECT * FROM review INNER JOIN game ON review.Game_ID = game.Game_ID  WHERE  review.Account_ID = '".$_SESSION['Account_ID']."'");
    echo '<br><br>';
	if (mysqli_num_rows($result) !== 0) {

        while($row=mysqli_fetch_array($result)){
            echo '<div class="order">
            <div class="ID">Review ID: <b>'.$row['Review_ID'].'</b><br></div>
            <div class="oDate">    
            Title: <b>'.$row['Title'].'</b><br></div>
            <div class="dDate">
            Rating: <b>'.$row['Rating'].' / 5</b><br></div>
            <div class="Price">Review: <br><span style="font-size: 24px; color: rgb(167, 0, 0);"><b>'.$row['Review'].'</b></span></div>
            <div class="nameedit">
                <form action="dataflow.php" method="post">
                    
                    <div class="form-element">
                        <label for="review">Edit:</label>
                        <input type="text" name="review"><br><br>
                        <input type="hidden" name="id" value="'.$row["Game_ID"].'">
                        <div class="formbuttons">
                        <input type="submit" value="Submit">
                        <input type="reset" value="Cancel">
                        </div>
                    </div>
                </form>
                
            </div>
            <script src="js/customeredit.js"></script>
            </div>
            ';
        }
        //<a href="dataflow.php?id='.$row['Game_ID'].'"><button type="submit">Submit</button></a>
    }
    else {
        echo "<div class='empty'>No order has been made</div>";
    }

?>

</html>
