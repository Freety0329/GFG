<!DOCTYPE html>
<html>

<style>
.parentbox {
  display: flex;
  flex-wrap: wrap;
}
.childbox {
  /*
  flex: flex-grow flex-shrink flex-basis;
  flex-grow 	A number specifying how much the item will grow relative to the rest of the flexible items
  flex-shrink 	A number specifying how much the item will shrink relative to the rest of the flexible items
  flex-basis 	The length of the item. Legal values: "auto", "inherit", or a number followed by "%", "px", "em" or any other length unit
  */
  flex: 0 0 350px;
  margin: 10px;
  height: 475px;
  background-color: #d9f9ff;
  border-radius: 10px;
  border: #d4d4d4 solid 2px;
  padding: 10px;
}
</style>

<style>
		body {
			background-color: #fafafa;
			font-family: 'Open Sans', sans-serif;
		}
		input:focus:valid {
			background-color: green;
		}
		input:focus:invalid {
			background-color: red;
		}
		textarea:focus:valid {
			background-color: green;
		}
		textarea:focus:invalid {
			background-color: red;
		}
		.centerbox {
			display: flex;
			align-items: center;
			justify-content: center;
			font-family: 'Yanone Kaffeesatz', sans-serif;
			position: static;
		}
		.container{
            margin-left: 5px;
            width: 550px;
            height: 900px;
            border: 1px solid #ddd;
            background-color: #ffffff;
            padding: 25px;
        }
		.label {
            color:blue;
            font-size: 20px;
        }
		input[type=text],input[type=number]{
            font-size:20px;
            height: 20px;
            width: 500px;
        }
		select{
			font-size:20px;
			height: 25px;
            width: 510px;
		}
		input[type=file]{
			font-size: 20px;
		}
		input[type=submit],input[type=reset] {
            font-size: 18px;    
            background-color: #333;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            padding: 10px;
			width: 100px;
        }
		input[type=submit]:hover,input[type=reset]:hover{
			background-color: #111;
		}
		h3{
			font-size: 30px;
			text-align: center;
		}
		#file-ip-1-preview,.preview{
			height:100px;
			width: 100px;
		}
		h1 {
            text-decoration: underline;
            text-align: center;
            font-size: 30px;
        }
	</style>

<head>
    <title>Company Background</title>
</head>

<body>
<div class="centerbox">
		<div class="container">

        <?php
            include("conn.php");
        $result = mysqli_query($con,"SELECT * FROM background");
        while($row = mysqli_fetch_array($result))
        {
        echo '<h2>Background of GFG</h2><br>';
        echo $row["Background"];

        echo '<h2>Mission</h2><br>';
        echo $row["Mission"];

        echo '<h2>Vision</h2><br>';
        echo $row["Vision"];
        }
        ?>
        <br>
        


        <h3>Contact Us:</h3>
        <address>
            Email: <a href="mailto:GFG@mail.com">GFG@mail.com</a>.<br>
        </address>
        <p>Telephone: 
        <a href="tel:0127755433">012-775-5433</a>
        </p>
				
        <?php
		mysqli_close($con);//to close the database connection
        ?>

        </div>
</div>



</body>
</html>