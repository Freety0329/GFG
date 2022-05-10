<?php
    include "navbar.php";
    include "connection.php";
    $customerdata = $mysqli-> query("SELECT * from account where Member_Email ='".$_SESSION["customersession"] . "'"); 
    $cusinfo = $customerdata->fetch_assoc();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Edit Account</title>
    <!-- link external css -->
    <link rel="stylesheet" href="css/customeredit.css">
    <!-- google fonts css link -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Bitter:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap" rel="stylesheet">
    <!-- font-awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css">

</head>
<body class="background">
        <div class="setting">
            <!-- Name -->
            <div class="topic">
                <h1 class="header1">General Account Information</h1>
                <i class='fas fa-user-shield' style='font-size:36px'></i>
            </div>
            <div class="namesetting">
                <h1 class="setting-name">Name <i class="fa fa-address-card" aria-hidden="true"></i></h1>
                <h1 class="name-content"><?php echo($cusinfo['Name']);?></h1>
                <h1 class="setting-edit"><span onclick="select(0)"><i class="fa fa-pencil" aria-hidden="true"></i></span></h1>
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            </div>
            <div class="nameedit">
                <form action="dataflow.php" method="post">
                    <h1>Name</h1>
                    <div class="form-element">
                        <label for="First Name">Name:</label>
                        <input type="text" name="name" required><br>
                        <!--<label for="Last Name">Last Name:</label>
                        <input type="text" name="lname" required><br>-->
                        <label for="password">Confirm Password</label>
                        <input type="password" name="pass" placeholder="Enter password to change the Name" required> <br><br>
                        <input type="submit" value="submit">
                        <input type="reset" value="cancel">
                    </div>
                </form>
            </div>
            <!-- Tel -->
            <div class="namesetting">
                <h1 class="setting-name">Phone Number  <i class="fa fa-phone" aria-hidden="true"></i></h1>
                <h1 class="name-content"><?php echo($cusinfo['Member_Telephone']);?></h1>
                <h1 class="setting-edit"><span onclick="select(1)"><i class="fa fa-pencil" aria-hidden="true"></i></span></h1>
            </div>
            <div class="nameedit">
                <form action="dataflow.php" method="post">
                    <h1>Contact Number</h1>
                    <div class="form-element">
                        <label for="phone">New Contact Number:</label>
                        <input type="tel" name="phone"  placeholder="Max 11numbers" minlength=10 maxlength=11><br>
                        <label for="password">Confirm Password</label>
                        <input type="password" name="pass" placeholder="Enter password to change the Contact Number" required><br><br>
                        <input type="submit" value="submit">
                        <input type="reset" value="cancel">
                    </div>
                </form>
            </div>
            <!--Dateofbirth-->
            <!-- <div class="namesetting">
                <h1 class="setting-name">Date of Birth <i class="fa fa-birthday-cake" aria-hidden="true"></i></h1>
                <h1 class="name-content"><?php echo($cusinfo['DOB']);?></h1>
                <h1 class="setting-edit"><span onclick="select(2)"><i class="fa fa-pencil" aria-hidden="true"></i></span></h1>
            </div>
            <div class="nameedit">
                <form action="dataflow.php" method="post">
                    <h1>Date of Birth</h1>
                    <div class="form-element">
                        <label for="date">New Date of Birth:</label>
                        <input type="Date" name="date"><br><br>
                        <input type="submit" value="submit">
                        <input type="reset" value="cancel">
                    </div>
                </form>
            </div> -->
            <!-- Pass -->
            <div class="namesetting">
                <h1 class="setting-name">Password <i class="fas fa-key"></i></h1>
                <h1 class="name-content">**ENCRYPTED**</h1>
                <h1 class="setting-edit"><span onclick="select(2)"><i class="fa fa-pencil" aria-hidden="true"></i></span></h1>
            </div>
            <div class="nameedit">
                <form action="dataflow.php"method="post">
                    <h1>Password</h1>
                    <div class="form-element">
                        <label for="password">Current Password</label>
                        <input type="password" name="cpassword"  placeholder="Max 12numbers" minlength=1 maxlength=12><br>
                        <label for="password">New Password:</label>
                        <input type="password" name="newpass"  placeholder="Max 12numbers" minlength=1 maxlength=12><br>
                        <label for="password">Confirm Password</label>
                        <input type="password" name="copass" placeholder="Enter password to change the Password" required><br><br>
                        <input type="submit" value="submit">
                        <input type="reset" value="cancel">
                    </div>
                </form>
            </div>
            <!-- Email-->
            <div class="namesetting">
                <h1 class="setting-name">Email <i class="far fa-envelope"></i></h1>
                <h1 class="name-content"><?php echo($_SESSION['customersession'])?></h1>
                <h1 class="setting-edit"><span onclick="select(3)"><i class="fa fa-pencil" aria-hidden="true"></i></span></h1>
            </div>
            <div class="nameedit">
                <form action="dataflow.php" method="post">
                    <h1>Email</h1>
                    <div class="form-element">
                        <label for="Email">Current Email</label>
                        <input type="Email" name="cemail"  placeholder="Enter your Current Email" ><br>
                        <label for="email">New Email:</label>
                        <input type="Email" name="nemail"  placeholder="Enter your New Email" ><br>
                        <label for="password">Confirm Password</label>
                        <input type="password" name="pass" placeholder="Enter password to change the Email" required><br><br>
                        <input type="submit" value="submit">
                        <input type="reset" value="cancel">
                    </div>
                </form>
            </div>
            <div class="namesetting">
                <h1 class="setting-name">Address <i class="fa fa-address-card" aria-hidden="true"></i></h1>
                <h1 class="name-content"><?php echo($cusinfo['Member_Address']);?></h1>
                <h1 class="setting-edit"><span onclick="select(4)"><i class="fa fa-pencil" aria-hidden="true"></i></span></h1>
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            </div>
            <div class="nameedit">
                <form action="dataflow.php" method="post">
                    <h1>Address</h1>
                    <div class="form-element">
                        <label for="First Name">Address:</label>
                        <input type="text" name="Member_Address" required><br>
                        <!--<label for="Last Name">Last Name:</label>
                        <input type="text" name="lname" required><br>-->
                        <label for="password">Confirm Password</label>
                        <input type="password" name="pass" placeholder="Enter password to change the address" required> <br><br>
                        <input type="submit" value="submit">
                        <input type="reset" value="cancel">
                    </div>
                </form>
            </div>
            <div class="namesetting">
                <h1 class="setting-name">Bank Card No <i class="fa fa-address-card" aria-hidden="true"></i></h1>
                <h1 class="name-content"><?php echo($cusinfo['Bank_Card_No']);?></h1>
                <h1 class="setting-edit"><span onclick="select(5)"><i class="fa fa-pencil" aria-hidden="true"></i></span></h1>
                <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
            </div>
            <div class="nameedit">
                <form action="dataflow.php" method="post">
                    <h1>Bank Card No</h1>
                    <div class="form-element">
                        <label for="First Name">Bank Card No:</label>
                        <input type="text" name="Bank_Card_No" placeholder="Please enter 16 digits" minlength=16 maxlength=16 required><br>
                        <!--<label for="Last Name">Last Name:</label>
                        <input type="text" name="lname" required><br>-->
                        <label for="password">Confirm Password</label>
                        <input type="password" name="pass" placeholder="Enter password to change the Bank Card No" required> <br><br>
                        <input type="submit" value="submit">
                        <input type="reset" value="cancel">
                    </div>
                </form>
            </div>
        </div>
<script src="js/customeredit.js"></script>
</body>
</html>