<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Receipt</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<?php
    //include("navbar_admin.php");
?>
<body>
    
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card mt-5">
                    <div class="card-header">
                        <h4>View Receipt</h4>
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
                                        <input type="text" name="search_key" style="width: 250px; padding: 8px; margin: 3px 0 11px 0; display: inline-block; font-size:12pt;"> 
                                      <button type="submit" class="btn btn-primary">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="card mt-4">
                    <div class="card-body">
                        <table class="table table-borderd">
                            <thead>
                                <tr>
                                    <th>Receipt ID</th>
                                    <th>Account ID</th>
                                    <th>Total Price</th>
                                    <th>Title</th>
                                    <th>Game ID</th>
                                    <th>Quantity</th>
                                    <th>Date of Purchase</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            <?php 
                                $con = mysqli_connect("localhost","root","","gfg");                               
                                
                                    if(isset($_GET['from_date']) && isset($_GET['to_date']) or isset($_GET['search_key']))
                                        {
                                            $from_date = $_GET['from_date'];
                                            $to_date = $_GET['to_date'];
                                            $search_key = $_GET['search_key'];
                                            $query ="";

                                            //$query = "SELECT * FROM game_cart WHERE Date_of_purchase BETWEEN '$from_date' AND '$to_date' ";
                                            if(intval($search_key)){
                                                $query = "SELECT * FROM game_cart WHERE Date_of_purchase BETWEEN '$from_date' AND '$to_date' and 
                                                Cart_ID in (select game_cart.Cart_ID from game_cart 
                                               inner join account
                                               on game_cart.Account_ID = account.Account_ID 
                                               where game_cart.Cart_ID=$search_key )";
                                            }else{
                                                $query = "SELECT * FROM game_cart WHERE Date_of_purchase BETWEEN '$from_date' AND '$to_date' and 
                                                Cart_ID in (select game_cart.Cart_ID from game_cart 
                                               inner join account
                                               on game_cart.Account_ID = account.Account_ID 
                                               where account.Name like '%$search_key%')";
                                            }
                                           
                                            //echo $query;

                                            // $query = "SELECT * FROM game_cart 
                                            // inner join account
                                            // on game_cart.Account_ID = account.Account_ID 
                                            // WHERE Date_of_purchase 
                                            // BETWEEN '$from_date' AND '$to_date' and Cart_ID or Name like '%$search_key%";
                                            
                                            // $search = "select * from game_cart 
                                            //     inner join account
                                            //     on game_cart.Account_ID = account.Account_ID 
                                            //     where Cart_ID and Name like '%$search_key%' 
                                            //     ORDER BY Cart_ID
                                            //     having $query ";
                                            
                                            $query_run = mysqli_query($con, $query);

                                            if(mysqli_num_rows($query_run) > 0)
                                            {
                                                foreach($query_run as $row)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?= $row['Cart_ID']; ?></td>
                                                        <td><?= $row['Account_ID']; ?></td>
                                                        <td><?= $row['Total_Price']; ?></td>
                                                        <td><?= $row['Title']; ?></td>
                                                        <td><?= $row['Game_ID']; ?></td>
                                                        <td><?= $row['Quantity']; ?></td>
                                                        <td><?= $row['Date_of_purchase']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            else
                                            {
                                                echo "No Record Found";
                                            }
                                        }
                                        else
                                        {
                                            $all = "SELECT * FROM game_cart ";
                                            $runall = mysqli_query($con, $all);

                                            if(mysqli_num_rows($runall) > 0)
                                            {
                                                foreach($runall as $row)
                                                {
                                                    ?>
                                                    <tr>
                                                        <td><?= $row['Cart_ID']; ?></td>
                                                        <td><?= $row['Account_ID']; ?></td>
                                                        <td><?= $row['Total_Price']; ?></td>
                                                        <td><?= $row['Title']; ?></td>
                                                        <td><?= $row['Game_ID']; ?></td>
                                                        <td><?= $row['Quantity']; ?></td>
                                                        <td><?= $row['Date_of_purchase']; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                        }
                                        
                            ?>
                            </tbody>
                        </table>
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