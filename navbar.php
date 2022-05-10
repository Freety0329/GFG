<!DOCTYPE html>
<html>
    <head>
        <link rel="shortcut icon" href="assets/logo.jpg" />
        <link href="'https://fonts.googleapis.com/css2?family=Roboto:wght@700&display=swap'">
        <link href="css/index.css" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <meta charset="UTF-8">
        <title>Games For Gamers</title>
    
    </head>
    <body>
        <header>
            <div class="container">
                
                <img src="assets/logo.jpg" button onclick="window.location='index.php';" alt="logo" style="margin-top: 6px; margin-bottom: 10px; padding: 0; width: 120px; height:50px;" class="logo">
                <nav>
                <ul class="main-menu">

                    <li><a href="index.php"><b>Home</b></a></li>
                    <li><a href="membercatalog.php"><b>Catalog</b></a></li>
                    <li><a href="viewabout.php"><b>About Us</b></a></li>
                    
                    <!--<i class='fas fa-user' style="margin-left: 70px;" >
                    </i>-->

                    <?php 
                        include("customersession.php");
                            
                        if(isset($_SESSION['customersession'])){
                            echo 
                            "<i class='fas fa-user' style=\"margin-left: 70px;\" ><ul class=\"user-dropdown\">
                            <li><i class=\"fa-solid fa-cart-shopping\"></i><a href=\"cart.php\"><b> CART</b></a></li>
                            <li><i class=\"fa-solid fa-clipboard-list\"></i><a href=\"viewhistory.php\"><b> ORDER</b></a></li>
                            <li><i class=\"fas fa-cog\"></i><a href=\"customeredit.php\"><b> ACCOUNT</b></a></li>
                            <li><i class=\"fas fa-power-off\"></i><a href=\"logout.php\"><b> LOGOUT</b></a></li>
    
                        </ul></i>";
                            
                            } 
                        else{
                            echo ("
                            <button onclick=\"window.location='login.php';\" class='btn-1' ><b>LOGIN</b></button>
                            ");
                            }   
                    ?>
                </ul>
                </nav>
            </div>
        </header>
    </body>
</html>

