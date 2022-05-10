<?php
   
    include("navbaradmin.php");
    include("conn.php");
    $product=mysqli_query($con,"SELECT* FROM product");
    $member=mysqli_query($con,"SELECT * FROM member")
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Page</title>
    <style>
        body{
            background-color: #fafafa;
            font-family: sans-serif;
        }
        .container{
            box-sizing: border-box;
            margin-right: -5px;
            margin-left: -5px;
            padding-left: 70px;
            padding-right: 15px;
        }
        .sidebar{
            background-color: #ffffff;
            margin-top: 30px;
            float: left;
            position: relative;
            width:230px;
            height:590px;
            border: 2px solid #dddddd;
        }
        .list{
            border:none;
            background-color: white;
            color:black;
            text-decoration: none;
            margin-bottom: 30px;
            padding:10px;
            font-size: 25px;
        }
        h3{
            color:white;
            background-color: #333;
            font-size: 30px;
            text-align: center;
        }
        .table {
            float: left;
            width: 35%;
            padding: 20px;
        }
        table {
            border-collapse: collapse;
            border-spacing: 0;
            width: 100%;
            border: 1px solid #ddd;
        }
        h4{
            text-decoration: underline;
            font-size:30px;
            text-align: center;
        }
        h1{
            text-decoration: underline;
            text-align: center;
        }
        td{
            border:1px solid #111;
            padding:5px;
            font-size: 20px;
        }
        button{
            background-color: #F6F8ED; 
            border-radius: 8px;
            transition-duration: 0.5s;
            padding: 24px;
            font-size: 25px;
            margin-right: 16px;
            margin-bottom: 30px;
            width: 250px;

        }
        button:hover{
            background-color: #ececec; 
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
        .registerbox {
            margin-left: 5px;
            width: 850px;
            height: 840px;
            border: 1px solid #ddd;
            background-color: #fafafa;
            padding: 25px;
        }
        .centerbox {
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Yanone Kaffeesatz', sans-serif;
            position: static;
        }
    </style>
</head>
<body>
    
    <div class = "container">
        <h1>Welcome To Admin Homepage</h1>
        <hr>


        <div class="centerbox">
            <div class="registerbox">
            <h3>Functions</h3>
            <button onclick="document.location='viewaccounte.php'">View Account List</button>
            <button onclick="document.location='viewgamee.php'">View Game List</button>
            <button onclick="document.location='addgame.php'">Add Game</button>
            <button onclick="document.location='viewreceipt.php'">View Receipt</button>
            <button onclick="document.location='viewsupplier.php'">View Publisher</button>
            <button onclick="document.location='addpublisher.php'">Add Publisher</button>
            <button onclick="document.location='generatereport.php'">Generate Report</button>
            <button style="padding: 27.5px 22px 26px 22px; font-size: 20px;"onclick="document.location='editcompanyhistory.php'">Edit Company History</button>


        </div>
        </div>


        
    </div>
</body>
</html>