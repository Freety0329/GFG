<?php
    //include("adminsession.php");
	if(isset($_POST["updateBtn"])){
		include("conn.php");

		$sql = "UPDATE account SET 

		Name='$_POST[Name]', 
		Member_Telephone='$_POST[Member_Telephone]', 
		Member_Email='$_POST[Member_Email]',
        Password='$_POST[Password]',
		Member_Address='$_POST[Member_Address]', 
		Bank_Card_No='$_POST[Bank_Card_No]'
		WHERE Account_ID=$_POST[Account_ID]";

		if (mysqli_query($con, $sql)) {
		mysqli_close($con);
		echo "<script>alert('Account information is updated.'); window.location.href='viewaccounte.php';</script>";
		}

	}

?>
<!DOCTYPE html>
<html>
    <title>Edit Account Profile</title>
    <head>
        <style>
            html{
                background-color: #fafafa;
                font-family: sans-serif;
            }
            h3{
                text-align: center;
                font-size: 30px;
            }
            .centerbox {
                display: flex;
                align-items: center;
                justify-content: center;
                font-family: 'Yanone Kaffeesatz', sans-serif;
                position: static;
            }
            h2{
                font-size: 40px;
                text-align: center;
            }
            .container{
                margin-left: 5px;
                width: 550px;
                height: 800px;
                border: 1px solid #ddd;
                background-color: #ffffff;
                padding: 25px;
            }
            p{
                font-size:20px;
            }
            .label {
                color:blue;
                font-size: 20px;
            }
            button[type=submit],input[type=button]{
                font-size: 18px;    
                background-color: #333;
                color: white;
                border: none;
                border-radius: 5px;
                cursor: pointer;
                padding: 10px;
            }
            input[type=text],input[type=email],input[type=number]{
                font-size:20px;
                height: 20px;
                width: 500px;
            }
            button[type=submit] {
                width: 100px;
            }
            button[type=submit]:hover,input[type=button]:hover{
                background-color: #111;
            }
        </style>
    </head>
    <body>
    <?php
        //include("navbar_admin.php");
    ?>
    <?php
        include("conn.php");
        $id = intval($_GET['id']);
        $result = mysqli_query($con,"SELECT * FROM account WHERE Account_ID=$id");
        while($row = mysqli_fetch_array($result))
        {
    ?>
        <form method="post">
        <input type="hidden" name="Account_ID" value="<?php echo $row['Account_ID'] ?>">
        <h2>Account Profile</h2>   
        <div class="centerbox">
        <div class="container">
        
        <h3>Profile</h3>
        <hr>
        <p>Edit account details and press update button.</p><br>
            <div class="section">
                <div class="label">
                    Name :
                </div>
                <div class="field">
                    <input type="text" value="<?php echo $row["Name"] ?>" name="Name" maxlength="50" required="required">
                </div>
            </div>
            <br>
            <div class="section">
                <div class="label">
                Member Telephone :
                </div>
                <div class="field">
                    <input type="number" value="<?php echo $row["Member_Telephone"] ?>" name="Member_Telephone" maxlength="10" required="required">
                </div>
            </div>
            <br>
            <div class="section">
                <div class="label">
                Member Email :
                </div>
                <div class="field">
                    <input type="text" value="<?php echo $row["Member_Email"] ?>" name="Member_Email" maxlength="50" required="required">
                </div>
            </div>
            <br>
            <div class="section">
                <div class="label">
                    Password :
                </div>
                <div class="field">
                    <input type="password" value="<?php echo $row["Password"] ?>" name="Password" minlength="6" maxlength="10" required="required">
                </div>
            </div>
            <br>
            <div class="section">
                <div class="label">
                    Member Address :
                </div>
                <div class="field">
                    <input type="text" value="<?php echo $row["Member_Address"] ?>" name="Member_Address" maxlength="255" required="required">
                </div>
	        </div>
            <br>
            <div class="section">
                <div class="label">
                    Bank Card Number :
                </div>
                <div class="field">
                    <input type="number" value="<?php echo $row["Bank_Card_No"] ?>" name="Bank_Card_No" minlength="16" maxlength="16" required="required">
                </div>
            </div>
            <br>        
            <div class="section">
                <div class="label">
                    &nbsp;
                </div>
                <div class="field">
                    <button type="submit" class="btn" name="updateBtn">Update</button>
					<a href="viewaccounte.php">
						<input type="button" value="Return">
					</a>
                </div>
            </div>
        </div>
        </div>
    </form>    
            <?php
        }
        mysqli_close($con);
    ?>
    </body>
</html>