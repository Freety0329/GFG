<?php
session_start();
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
        window.location.href= ('adminpage.php');</script>";//change to adminpage,php

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
        header("location: membercatalog.php");//chang to member page

        } else {
		echo "<script>alert('The username or password entered is not valid. Please try again.');</script>";
	    }
    
	mysqli_close($con);
}
?>

<!DOCTYPE html>
<html lan="en" and dir="Itr">
<head>
    <meta charset="utf-8">
    <title> Login Form </title>
    <link rel="stylesheet" href="css/style2.css">
    <script src="login2.js"></script>
</head>
<body>
    <form class="box" action="stafflogin.php" method="POST">
        <h1>
            login
        </h1>
        <input type="text" name="Member_Email" placeholder="Enter Username" id="username">
        <input type="password" name="Password" placeholder="Enter Password" id="password">
        <input type="submit" name="" value="Login" onclick="validate()">
    </form>
</body>

<!--<script>/*function validate()
{
var username=document.getElementById("username").value;
var password=document.getElementById("password").value;
if(username=="2"&& password=="2")*/
{
    alert("Login Successfully");
    return false;
}
else
{
    alert("Login Failed");
}
}</script>-->
</html>