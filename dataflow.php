<?php
    session_start();
    include "connection.php";
    $customerdata = $mysqli-> query("SELECT * from account where Member_Email ='".$_SESSION["customersession"] . "'");
    $cusinfo = $customerdata->fetch_assoc(); 
    if(isset($_POST["name"])){
        $name=$_POST["name"];
        //$lname=$_POST["lname"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        if($enterpassword === $passwordhased){
            $sql="UPDATE account SET Name='".$name."'where Member_Email ='".$_SESSION['customersession'] . "'";
            $mysqli->query($sql);
            //$sql2="UPDATE customer SET Customer_LName='".$lname."'where Member_Email ='".$_SESSION['customersession'] . "'";
            //$mysqli->query($sql2);
            header("location:customeredit.php");
        }else{
            echo "<script>alert('Password incorrect');
            window.location.href='customeredit.php';
            </script>";
        }             
    }  
      

    if(isset($_POST["phone"])){
        $tel=$_POST["phone"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        if($enterpassword === $passwordhased){
            $sql="UPDATE account SET Member_Telephone='".$tel."'where Member_Email ='".$_SESSION['customersession'] . "'";
            $mysqli->query($sql);
            header("location:customeredit.php");
        }else{
            echo "<script>alert('Password incorrect');
            window.location.href='customeredit.php';
            </script>";
        }    
    }
    
    if(isset($_POST["date"])){
        $d=$_POST["date"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        $sql="UPDATE account SET DOB='".$d."'where Member_Email ='".$_SESSION['customersession'] . "'";
        $mysqli->query($sql);
        header("location:customeredit.php");
    }

    if(isset($_POST["review"])){
        $id = $_POST['id'];
        $r=$_POST["review"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        $sql="UPDATE review SET Review='".$r."'WHERE Account_ID ='".$_SESSION['Account_ID'] . "' AND Game_ID='".$id."'";
        $mysqli->query($sql);
        header("location:viewreview.php");
    }

    if(isset($_POST["cpassword"])){
        $currentpass=$_POST["cpassword"];
        $passwordhased = $cusinfo["Password"];
        $newpass=$_POST['newpass'];
        $compass=$_POST['copass'];
        if($currentpass === $cusinfo['Password']){
            if($newpass===$compass){
                $t=password_hash($newpass,PASSWORD_DEFAULT);
                $sql="UPDATE account SET Password='".$newpass."'where Member_Email ='".$_SESSION['customersession'] . "'";
                $mysqli->query($sql); 
                header("location:customeredit.php");
            }else{
                echo "<script>alert('Password or new password incorrect');
                window.location.href='customeredit.php';
                </script>";
            }
    }   }
    
    if(isset($_POST["cemail"])){
        $currentemail=$_POST["cemail"];
        $newemail=$_POST["nemail"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        if($currentemail===$cusinfo["Member_Email"]){
            if($enterpassword === $passwordhased){
                //$_SESSION['customersession']=$newemail;
                $sql="UPDATE account SET Member_Email='".$newemail."'where Member_Email ='".$_SESSION['customersession'] . "'";
                $mysqli->query($sql); 
                header("location:customeredit.php");  
                $_SESSION['customersession']=$newemail;
                echo ($sql);
            }
        }else{
            echo "<script>alert('Email or password incorrect');
            window.location.href='customeredit.php';
            </script>";
        }

    }

    if(isset($_POST["Member_Address"])){
        $name=$_POST["Member_Address"];
        //$lname=$_POST["lname"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        if($enterpassword === $passwordhased){
            $sql="UPDATE account SET Member_Address='".$name."'where Member_Email ='".$_SESSION['customersession'] . "'";
            $mysqli->query($sql);
            //$sql2="UPDATE customer SET Customer_LName='".$lname."'where Member_Email ='".$_SESSION['customersession'] . "'";
            //$mysqli->query($sql2);
            header("location:customeredit.php");
        }else{
            echo "<script>alert('Password incorrect');
            window.location.href='customeredit.php';
            </script>";
        }             
    }
    
    if(isset($_POST["Bank_Card_No"])){
        $name=$_POST["Bank_Card_No"];
        //$lname=$_POST["lname"];
        $enterpassword=$_POST["pass"];
        $passwordhased = $cusinfo["Password"];
        if($enterpassword === $passwordhased){
            $sql="UPDATE account SET Bank_Card_No='".$name."'where Member_Email ='".$_SESSION['customersession'] . "'";
            $mysqli->query($sql);
            //$sql2="UPDATE customer SET Customer_LName='".$lname."'where Member_Email ='".$_SESSION['customersession'] . "'";
            //$mysqli->query($sql2);
            header("location:customeredit.php");
        }else{
            echo "<script>alert('Password incorrect');
            window.location.href='customeredit.php';
            </script>";
        }             
    }

?>