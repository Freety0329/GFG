<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Generate Report</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>


<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>Generate Report</h4>
                    </div>
                    <div class="card-body">
                    
                        <form action="" method="GET">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>Start Date</label>
                                        <input type="date" name="from_date" value="<?php if(isset($_GET['from_date'])){ echo $_GET['from_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label>End Date</label>
                                        <input type="date" name="to_date" value="<?php if(isset($_GET['to_date'])){ echo $_GET['to_date']; } ?>" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <label></label> <br>
                                      <button type="submit" class="btn btn-primary" name="generatebtn">Generate</button>
                                      
                                      <button type="submit" class="btn btn-primary" onclick="window.print();return false;">Print</button>
                                    
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        
                        
                            
                            <?php 
                                $conn = mysqli_connect("localhost","root","","gfg");
                                  
                                

                                    if(isset($_GET['from_date']) && isset($_GET['to_date'])){  

                                        $from_date = $_GET['from_date'];
                                        $to_date = $_GET['to_date'];

                                        if ($from_date > $to_date){
                                            echo "Please ensure the start date is before the end date";
                                            //echo $from_date;
                                            
                                        }
                                        

    
                                        else if ($from_date == null or $to_date == null){
                                            echo "Please enter start date and end date for report to be generated";
                                            //echo $from_date;
                                        }

                                        else{

                                            $transactions = "SELECT count(Cart_ID) FROM game_cart WHERE Date_of_purchase BETWEEN '$from_date' AND '$to_date'";
                                            $tresult = $conn->query($transactions);

                                            while ($row = mysqli_fetch_array($tresult)){
                                                echo "Total Transactions:  ".$row['count(Cart_ID)'];
                                            }


                                            ?>                          

                                            <br>
                                            <br>

                                            <?php

                                            $ngame = "SELECT count(distinct Game_ID) FROM game_cart WHERE Date_of_purchase BETWEEN '$from_date' AND '$to_date'";
                                            $gresult = $conn->query($ngame);

                                            while ($row = mysqli_fetch_array($gresult)){
                                                echo "Type of Games Sold:  ".$row['count(distinct Game_ID)'];
                                            }

                                            ?>

                                            <br>
                                            <br>

                                            <?php

                                            

                                                $total = "SELECT sum(Total_Price) FROM game_cart WHERE Date_of_purchase BETWEEN '$from_date' AND '$to_date'";
                                                $result = $conn->query($total);
    
                                                
                                                
                                                while ($row = mysqli_fetch_array($result)){
                                                    echo "Total Sales (RM):  ".$row['sum(Total_Price)'];
                                                }
                                                ?>
                                                <hr>

                                                <table class="table table-borderd">
                                                <thead>
                                                    <tr>
                                                        <th>Game ID</th>
                                                        <th>Game Title</th>
                                                        <th>Total Sold</th>
                                                    </tr>
                                                </thead>

                                                <?php
                                                $list = "SELECT game_cart.Game_ID, sum(game_cart.Quantity), game.Title
                                                FROM game_cart 
                                                join game
                                                on game_cart.Game_ID = game.Game_ID
                                                where game_cart.Game_ID 
                                                in (SELECT distinct game_cart.Game_ID FROM game_cart) 
                                                and 
                                                Date_of_purchase BETWEEN '$from_date' AND '$to_date' 
                                                group by game_cart.Game_ID";
                                                
                                                
                                                //$result = $conn->query($list);
                                                $query_run = mysqli_query($conn, $list);


                                            //     $query = "SELECT * FROM game_cart WHERE Date_of_purchase BETWEEN '$from_date' AND '$to_date' and 
                                            //     Cart_ID in (select game_cart.Cart_ID from game_cart 
                                            //    inner join account
                                            //    on game_cart.Account_ID = account.Account_ID 
                                            //    where game_cart.Cart_ID=$search_key )";
    
                                               
                                                
                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?= $row['Game_ID']; ?></td>
                                                        <td><?= $row['Title']; ?></td>
                                                        <td><?= $row['sum(game_cart.Quantity)']; ?></td>

                                                    </tr>
                                                    <?php
                                                }
                                            }
                                                ?>

                                        <?php
                                            
                                        }
          
                                    }                               
                            ?>
                        <div class="field">
					    <a href="adminpage.php">
						<input type="button" value="Return">
					    </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>