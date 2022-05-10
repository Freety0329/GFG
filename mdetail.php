<?php
    //include("customersession.php");
    include("conn.php");
    //include('config.php');
    
    include("navbar.php");
    //$connect = new PDO("mysql:host=localhost;dbname=gfg", "root", "");

?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Game Details</title>
        <script src="js/jquery-1.10.2.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/bootstrap.min.js"></script>
        
        <style>
            html{
                background-color: #fafafa;
                font-family: sans-serif;
            }
            .list{
                position: relative;
                min-height: 1px;
                margin-left: 15px;
                margin-right: 20px;
                float: left;
                width: 25%;
                background-color: #ffffff;
            }
            .items{
                position: relative;
                min-height: 1px;
                padding-left: 15px;
                padding-right: 15px;
                float: left;
                width: 70%;
            }
            .item-grouping{
                position: relative;
                display: block;
                padding: 10px 15px;
                margin-bottom: -1px;
                background-color: #ffffff;
                border: 1px solid #dddddd;
            }
            input[type="checkbox"] {
                margin: 4px 0 0;
                margin-top: 1px \9;
                line-height: normal;
            }
            .container{
                margin-right: auto;
                margin-left: auto;
                padding-left: 70px;
                padding-right: 15px;
            }
            h2{
                font-size: 30px;
                text-decoration: underline;
            }
            h4.pricetag{
                font-size:20px;
            }
            a.addtocart{
                text-decoration: none;
                background-color: #333;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                padding: 10px;
                font-size:20px;
            }
            a.addtocart:hover{
                background-color: #111;
            }
            p.product_name{
                color:blue;
                font-size: 25px;
                font-weight: bold;
            }
            .group{
                text-align: center;
            }
            .cartbutton{
                text-align: center;
            }
            .desc{
                height:120px;
            }
            .centerbox {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Yanone Kaffeesatz', sans-serif;
            position: static;
            }
            .registerbox {
            margin-left: 5px;
            width: 550px;
            height: 840px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            padding: 25px;
            }
        </style>
    </head>
<body>
        
            <!-- Page Content -->

    <div class="container">
        <div class="row">

            <?php

                $productid=intval($_GET['id']);

                $memberid = $_SESSION['Account_ID'];

                $result=mysqli_query($con,"SELECT* FROM game WHERE Game_ID=$productid");

                while($row=mysqli_fetch_array($result))
                {

                    $contact_pic = "default.jpg";
                    if ($row['Game_Pic']!=""){
                        $contact_pic = $row['Game_Pic'];
                    }

            ?>



<div class="centerbox">
    <div class="registerbox">   
            <div class="section">
                    <?php     
                    echo '<img style="vertical-align: middle; margin-right: 5px" src="uploadg/'.$contact_pic.'" width="120px" " height="120px">';
                    ?>
                <div class="field">
                </div>
            </div>

            <br>


            <div class="section">
                <div class="label">
                    Title: 
                </div>
                <div class="field">
                    <?php echo $row['Title'] ?>
                </div>
            </div>

            <br>

            <div class="section">
                <div class="label">
                    Video Game Console: 
                </div>
                <div class="field">
                    <?php echo $row['Video_Game_Console'] ?>
                </div>
            </div>

            <br>

            <div class="section">
                <div class="label">
                    Publisher: 
                </div>
                <div class="field">
                    <?php echo $row['Publisher_ID'] ?>
                </div>
            </div>

            <br>

            <div class="section">
                <div class="label">
                    Price: 
                </div>
                <div class="field" >
                    <?php echo $row['Price'] ?>		
                </div>
            </div>

            <br>

            <div class="section">
                <div class="label">
                    Quantity: 
                </div>
                <div class="field">
                    <?php echo $row['Quantity'] ?>
                </div>
            </div>

            <br>

            <div class="section">
                <div class="label">
                    Description
                </div>
                <div class="field">
                    <?php echo $row['Description'] ?>
                </div>
            </div>

            <br>
        
            <?php
                
                $cresult =$con->query("select * FROM review WHERE Game_ID=$productid and Account_ID=$memberid");
            
                
                if($cresult->num_rows == 1) {
                    while($row = mysqli_fetch_array($cresult))
                    { 
            ?>
                        <form action="mdetail.php?id=<?php echo $productid ?>" method="post">
                            <div class="section">
                                        <div class="label">
                                            Rating (1 (lowest) to 5(highest)):
                                        </div>
                                        <div class="field" >
                                            <select name="Rating" required="required">
                                            <option value="3" selected>Please select</option>
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            </select>		
                                        </div>
                            </div>
                            <br>
                                    <div class="section">
                                        <div class="label">
                                            Comment :
                                        </div>
                                        <div class="field">
                                            <input type="text" value="<?php echo $row['Review'] ?>" name="Comment" required="required">
                                        </div>
                                    </div>
                                    <br>

                            <div class="section">
                                <div class="label">
                                    &nbsp;
                                </div>
                                <div class="field">
                                    <input type="submit" value="Update" name="submitBtn"> 
                                    <input type="submit" value="Delete" name="Deletebtn" onclick="return confirm('Are you sure you want to remove this comment?');">
                                    
                                <?php
                                    
                                    // if (isset($_POST['Deletebtn'])) {
                                    //     echo"test";
                                    //     $Delete="DELETE FROM review 
                                    //     WHERE Account_ID=$memberid and Game_ID=$productid";
                                        
                                    //     if (!mysqli_query($con,$Delete)){
                                    //         die('Error: ' . mysqli_error($con));
                                    //     } else {
                                    //         echo '<script>alert("A comment is deleted.");
                                    //         window.location.href= "mdetail.php?id='.$productid.'";
                                    //         </script>';
                                    //     }
                                    // }
                                ?>
                                </div>
                            </div>
                        </form>
                    <?php
                        if (isset($_POST['submitBtn'])) {
                            $updater = "UPDATE review SET 
                            Rating= $_POST[Rating], 
                            Review='$_POST[Comment]'
                            WHERE Account_ID=$memberid and Game_ID=$productid";

                            if (!mysqli_query($con,$updater)){
                                die('Error: ' . mysqli_error($con));
                            } else {
                                echo '<script>alert("A comment is updated.");
                                window.location.href= "mdetail.php?id='.$productid.'";
                                </script>';
                            }
                        }

                        if (isset($_POST['Deletebtn'])) {
                            $Delete="DELETE FROM review 
                            WHERE Account_ID=$memberid and Game_ID=$productid";
                            
                            if (!mysqli_query($con,$Delete)){
                                die('Error: ' . mysqli_error($con));
                            } else {
                                echo '<script>alert("A comment is deleted.");
                                window.location.href= "mdetail.php?id='.$productid.'";
                                </script>';
                            }
                        }
                    ?>
            
                    <?php
                    }
                    ?>
                    <?php
                }
                else if($cresult->num_rows == 0) {
                    
                ?>
                <form action="mdetail.php?id=<?php echo $productid ?>" method="post">
                    <div class="section">
                                    <div class="label">
                                        Rating (1 (lowest) to 5(highest)):
                                    </div>
                                    <div class="field" >
                                        <select name="Rating" required="required">
                                        <option value="3" selected>Please select</option>
                                        <option value="1">1</option>
                                        <option value="2">2</option>
                                        <option value="3">3</option>
                                        <option value="4">4</option>
                                        <option value="5">5</option>
                                        </select>		
                                    </div>
                    </div>
                    <br>
                    <div class="section">
                        <div class="label">
                            Comment
                        </div>
                        <div class="field">
                            : <input type="text" name="Comment" required="required">
                        </div>
                    </div>
                    <br>
                    <div class="section">
                        <div class="label">
                            &nbsp;
                        </div>
                        <div class="field">
                            <input type="submit" value="Submit" name="Submit"> 
                            <input type="reset" value="Reset">

                    </div>
                
                    <?php
                    if (isset($_POST['Submit'])) {
                    $insertr="INSERT INTO review (Rating, Review, Game_ID, Account_ID) VALUES ('$_POST[Rating]','$_POST[Comment]',$productid,$memberid)";
                        echo "test";
                        if (!mysqli_query($con,$insertr)){
                            die('Error: ' . mysqli_error($con));
                        } else {
                            echo '<script>alert("A comment is added.");
                            window.location.href= "mdetail.php?id='.$productid.'";
                            </script>';
                        }
                    }
                    ?>
                </form>
        
        
            <?php
            }
            
            ?>

            <h1>Reviews</h1>
            <table width="80%">
                <tr bgcolor="#D3D3D3">
                    <th>Name</th>
                    <th>Rating</th>
                    <th>Review</th>
                </tr>

            <?php 
    
                
                echo"<trbgcolor=\"#99FF66\">"; // alternative way is : echo ‘<trbgcolor="#99FF66">’;

                // $test = mysqli_query($con,
                // "SELECT *
                // FROM review
                // where Game_ID=$productid
                // ");
                $show=mysqli_query($con,
                "SELECT review.Game_ID, review.Rating, review.Review, review.Account_ID, account.Account_ID, account.Name, game.Game_ID
                FROM review
                inner join account
                on review.Account_ID = account.Account_ID
                inner join game
                on game.Game_ID=review.Game_ID
                where review.Game_ID=$productid");
                
                while($row=mysqli_fetch_array($show))
                {   

                    echo"<trbgcolor=\"#99FF66\">"; // alternative way is : echo ‘<trbgcolor="#99FF66">’;
                
                    echo"<td>";
                    echo $row['Name'];
                    echo"</td>";
                
                    echo"<td>";
                    echo $row['Rating'];
                    echo"</td>";
                    
                    echo"<td>";
                    echo$row['Review'];
                    echo"</td></tr>";
                    
                }
                }


            mysqli_close($con);//to close the database connection
            ?>
        </div>
    </div>
</div>

</body>
</html>