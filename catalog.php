<?php
    include("navbarnos.php");

    include('conn.php');


//database_connection.php

$connect = new PDO("mysql:host=localhost;dbname=gfg", "root", "");


?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Catalog</title>
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

            .items input {
	        border: 3px outset #e6e6e6;
	        border-radius: 5px;
            }

            .common_selector.button {
                color: white;
                border: none;
                background-color: #333;
                border-radius: 20px;
                height: 40px;
                width: 80px;
                margin-left: 5px;
            }

            .items .search {
                margin: 0 15px;
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
                height:90px;
            }
            h1 {
            text-decoration: underline;
            text-align: center;
            font-size: 30px;
            }
        </style>
    </head>
    <body>
       
            <!-- Page Content -->
    <div class="container">
        <div class="row">
        	<br>
        
        	<br>
            <div class="list">                							
                <div class="grouping">
					<h3>Video Game Console</h3>
					<?php
                    $query = "SELECT DISTINCT (Video_Game_Console) FROM game ORDER BY Video_Game_Console";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="item-grouping checkbox">
                        <label><input type="checkbox" class="common_selector Video_Game_Console" value="<?php echo $row['Video_Game_Console']; ?>"  > <?php echo $row['Video_Game_Console']; ?></label>
                    </div>
                    <?php
                    }
                    ?>
                </div>
                <div class="grouping">
					<h3>Publisher</h3>
                    <?php

                    $query = "SELECT DISTINCT * FROM publisher ORDER BY Publisher_ID";
                    $statement = $connect->prepare($query);
                    $statement->execute();
                    $result = $statement->fetchAll();
                    foreach($result as $row)
                    {
                    ?>
                    <div class="item-grouping checkbox">
                        <label><input type="checkbox" class="common_selector Publisher_ID" value="<?php echo $row['Publisher_ID']; ?>" > <?php echo $row['Publisher_Name']; ?></label>
                    </div>
                    <?php    
                    }
                    ?>
                </div>

            </div>
            <div class="items">
            	
            
                <div class="searchbar" style="margin-bottom: 10px;">
                    <span class="search"> Search </span>
                    <input type="text" id ="search" style="width: 250px; padding: 8px; margin: 3px 0 11px 0; display: inline-block; font-size:12pt;"> 
                    <button class="common_selector button" name="searchBtn" type="submit">Submit</button>
                </div>
                <div class="row filter_data">

                </div>
            </div>
        </div>
    </div>
<style>
#loading
{
	text-align:center; 
	background: url('images/loader.gif') no-repeat center; 
	height: 150px;
}
</style>

<script>
    
$(document).ready(function(){
    

    filter_data();

    function filter_data()
    {
        $('.filter_data').html('<div id="loading" style="" ></div>');
        var action = 'fetch_data';
        var Video_Game_Console = get_filter('Video_Game_Console');
        var Publisher_ID = get_filter('Publisher_ID');
        var Search = document.getElementById('search').value;
        $.ajax({
            url:"fetch_data.php",
            method:"POST",
            data:{action:action, Video_Game_Console:Video_Game_Console, Publisher_ID:Publisher_ID, Search:Search},
            success:function(data){
                $('.filter_data').html(data);
            }
        });
    }

    function get_filter(class_name)
    {
        var filter = [];
        $('.'+class_name+':checked').each(function(){
            filter.push($(this).val());
        });
        return filter;
    }

    $('.common_selector').click(function(){
        filter_data();
    });



});
</script>
    </body>
</html>