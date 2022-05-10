<!DOCTYPE html>
<html>
<?php



include('conn.php');

$connect = new PDO("mysql:host=localhost;dbname=gfg", "root", "");
?>



<?php

    if(isset($_POST["action"]))
    {
        $query = "SELECT * FROM game WHERE Game_ID >= 1 ";

        if(isset($_POST["Video_Game_Console"]))
        {
            $category_filter = implode("','", $_POST["Video_Game_Console"]);
            $query .= "
            AND Video_Game_Console IN('".$category_filter."')
            ";
        }
        if(isset($_POST["Publisher_ID"]))
        {
            $brand_filter = implode("','", $_POST["Publisher_ID"]);
            $query .= "
            AND Publisher_ID IN('".$brand_filter."')
            ";
        }
        if(isset($_POST["Search"]))
        {
            $search_key =  $_POST["Search"];
            $query .= "
            and Title like '%$search_key%'

            ";
        }
       
        $statement = $connect->prepare($query);
        // echo $query;
        $statement->execute();
        $result = $statement->fetchAll();
        $total_row = $statement->rowCount();
        $output = '';
        if($total_row > 0)
        { 
            foreach($result as $row)
            {
                $pid = intval($row['Publisher_ID']);
                $pq="SELECT * FROM publisher where Publisher_ID = '$pid'";
                $data=$con->query($pq);
                $data=$data->fetch_array()['Publisher_Name'];
                $output .= '
                <div class="list">
                    <div style="border:1px solid #ccc; border-radius:5px; padding:16px; margin-bottom:16px; height:560px;">
                        <div class="group">
                            <img src="uploadg/'. $row['Game_Pic'] .'" alt="" style="width: 120px;height: 120px;" >
                            <p class="product_name">'. $row['Title'] .'</p>
                            <h4 class="pricetag" >RM '. $row['Price'] .'</h4>
                        </div>    
                            <p>Quantity: '.$row['Quantity'].'<hr>
                            Publisher Name : <br>'. $data .' <hr></p>
                        <div class="desc">
                            <p>Description: <br><br>'.$row['Description'].' </p>
                        </div>
                        <div class= "cartbutton">
                                <a class="addtocart" style="font-weight: 900;" href="detail.php?id='.$row['Game_ID'].'">View Details</a>
                        </div>
                        <br>
                        <br>
                        <div class= "cartbutton">
                            <a class="addtocart" style="font-weight: 900;" onclick="login()">Add to Cart</a>
                        </div>
                    </div>

                </div>
                ';
            }
        }
        else
        {
            $output = '<h3>No Game Found</h3>';
        }
        echo $output;
       
    }

// }

mysqli_close($con);

?>
<script>
function login() {
  alert("Please login to purchase.");
}
</script>
</html>