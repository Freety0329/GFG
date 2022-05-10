<?php
include("navbarnos.php");

//session_start();
include("conn.php");


if($_SERVER["REQUEST_METHOD"] == "POST")   
{
	$username=mysqli_real_escape_string($con,$_POST['Member_Email']); 
	$password=mysqli_real_escape_string($con,$_POST['Password']);
    //$user_type=mysqli_real_escape_string($con,$_POST['User_Type']);

    
        $admininfo="SELECT Account_ID FROM account WHERE Member_Email='$username' and Password='$password' and User_Type='Admin'";

        if ($userdata=mysqli_query($con,$admininfo))  {
            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($userdata);	  
          }
        
        while($row=mysqli_fetch_array($userdata)){
            $id = $row['Account_ID'];
        }

        if($rowcount == 1)  {	
        $_SESSION['adminsession']=$username;
        $_SESSION['Account_ID']=$id;
        echo "<script> alert('Login Successfully'); 
        window.location.href= ('adminpage.php');</script>";

        } 
        //else {
		//echo "<script>
        //alert('The username or password entered is not valid. Please try again.a');
        //break;
        //</script>";
	    //}

    
        $userinfo="SELECT Account_ID FROM account WHERE Member_Email='$username' and Password='$password' and User_Type='Member'";

        if ($userdata=mysqli_query($con,$userinfo))  {
            // Return the number of rows in result set
            $rowcount=mysqli_num_rows($userdata);	  
          }

        while($row=mysqli_fetch_array($userdata)){
            $id = $row['Account_ID'];
        }

        if($rowcount == 1)  {	
        $_SESSION['customersession']=$username;
        $_SESSION['Account_ID']=$id;
        echo "<script> alert('Login Successfully'); 
        window.location.href= ('index.php');</script>";

        } else {
		echo "<script>alert('The email address or password entered is not valid. Please try again.');</script>";
	    }
    
	mysqli_close($con);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body{
            background-color: #fafafa;
            font-family: sans-serif;
        }
        .title {
            text-align: center;
            width: 100%;
            font-family: 'Yanone Kaffeesatz', sans-serif;
        }
        .positionbox {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Yanone Kaffeesatz', sans-serif;
        }
        .loginbox {
            margin-right: 5px;
            width: 600px;
            height: 410px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            padding: 10px;
        }
        .registerbox {
            margin-left: 5px;
            width: 600px;
            height: 410px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            padding: 10px;
        }
        h3 {
            font-size: 25px;
        }
        p, label {
            font-size: 20px;
        }

        #adminCheckbox {
            font-size: 14px;
        }
        input[type=submit] {
            font-size: 18px;    
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px;
        }
        input[type=text], input[type=password] {
            height: 20px;
            width: 500px;
        }
        input[type=submit] {
            width: 300px;
        }
        h1 {
            text-decoration: underline;
            text-align: center;
            font-size: 30px;
        }
    </style>
</head>
<body>
    <?php
        //include("navbar.php");
    ?>
    <br><h1>User Login</h1><br><br>
    <form method="POST">
    <div class="positionbox">
        <div class="loginbox">
            <h3>REGISTERED CUSTOMERS</h3>
            <hr>
            <p>Please sign in with your email and password if you have an account.</p><br>
            <label>Email: </label><br><input type="text" name="Member_Email" required="required"><br><br>
            <label>Password: </label><br><input type="password" name="Password" required="required"><br><br>

            <input type="submit" value="LOG IN">
        </div>
    </form>
    <form action="signup.html">
        <div class="registerbox">
            <h3>NEW CUSTOMERS</h3>
            <hr>
            <p>If you don't have an account, register to create an account and start shopping.</p><br>
            <input type="submit" value="CREATE AN ACCOUNT">
        </div>
    </form>
    </div>
</body>
</html>