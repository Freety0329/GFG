<?php
    include("conn.php");
    $pwd = $_POST['password'];
    $user_email = $_POST['Email'];
    $encrypted_pwd = password_hash($pwd, PASSWORD_DEFAULT);
    $Address = $_POST['Address_1'] . "| " . $_POST['Address_2'] . "| " . $_POST['zipcode'] . "| " . $_POST['State'];
    $Name = $_POST['FName'] . " " . $_POST['LName'];
    $sql = "INSERT INTO account (Name, Member_Email, Member_Telephone, Member_Address, User_Type, Bank_Card_No,Password)
    VALUES
    ('$Name', '$_POST[Email]', '$_POST[Phone]', '$Address', 'Member', '$_POST[Bank_Card_No]', '$pwd')"; 
    if(!mysqli_query($con, $sql)){
        echo '<script>';
        echo 'alert ("Email has been taken!");';
        echo 'window.location.href = "signup.html";';
        echo '</script>';
    }
    else{
        echo ("
        <script> alert('Account Created!');
        window.location.href = 'login.php';
        </script>");
    }
    mysqli_close($con);
?>