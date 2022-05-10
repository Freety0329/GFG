
<?php
    include("navbaradmin.php");
    $con = mysqli_connect("localhost", "root","","gfg");
    $db = mysqli_select_db($con, 'background');
    //include("adminsession.php");
	if(isset($_POST["updateBtn"]))
    {
		include("conn.php");

		$sql = "UPDATE background SET    
        Background ='$_POST[Background]',
		Mission ='$_POST[Mission]',
		Vision ='$_POST[Vision]'
		";

		if ( mysqli_query($con,$sql)) 
        {
		mysqli_close($con);
		echo "<script type='text/javascript'> alert('Company History information is updated.'); window.location.href='editcompanyhistory.php';</script>";
        hearder("location:adminpage.php");
		}  

	}


?>
<!DOCTYPE html>
<html>
    <title>Edit Company History</title>
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
                
                
                font-family: 'Yanone Kaffeesatz', sans-serif;
                position: static;
                width: fit-content;
                margin: 0 auto
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
                font-size: 25px;
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
            input[type=text],input[type=text],input[type=text]{
                font-size:20px;
                height: 20px;
                width: 500px;
                padding: 8px 15px 8px 15px;
                margin: 10px 0px 15px 0px;
                box-shadow: 1px 1px 2px 1px grey;
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
        //$id = intval($_GET['background']);
        $result = mysqli_query($con,"SELECT * FROM background");
        while($row = mysqli_fetch_array($result))
        {
    ?>
        <form method="post">

          
        <div class="centerbox">
        <div class="container">
        
        <h3>Company History</h3>
        <hr>
        <p>Edit company history and press update button.</p><br>
            <div class="section">
                <div class="label">
                    Background :
                </div>
                <div class="field">
                    <input type="text" value="<?php echo $row["Background"] ?>" name="Background" required="required">
                </div>
            </div>
            <br>
            <div class="section">
                <div class="label">
                Mission :
                </div>
                <div class="field">
                    <input type="text" value="<?php echo $row["Mission"] ?>" name="Mission" required="required">
                </div>
            </div>
            <br>
            <div class="section">
                <div class="label">
                Vision :
                </div>
                <div class="field">
                    <input type="text" value="<?php echo $row["Vision"] ?>" name="Vision" required="required">
                </div>
            </div>
            <br>        
            <div class="section">
                <div class="label">
                    &nbsp;
                </div>
                <div class="field">
                    <button type="submit" class="btn" value="Update data" name="updateBtn">Update</button>
					<a href="adminpage.php">
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