<!DOCTYPE html>
<style>

</style>
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
                
                <img src="assets/logo.jpg" button onclick="window.location='index.php';" alt="logo" style="margin-top: 6px; padding: 0; width: 120px; height:50px;" class="logo">
                <nav>
                <ul class="main-menu">
                
                    <li><a href="index.php"><b>Home</b></a></li>
                    <?php 
                        include("session.php");
                        if(isset($_SESSION['customersession'])){
                            echo '<li><a href="membercatalog.php"><b>Catalog</b></a></li>';
                        }
                        else{
                            echo '<li><a href="catalog.php"><b>Catalog</b></a></li>';
                        }
                    ?>
                    <li><a href="viewabout.php"><b>About us</b></a></li>
                    
                    <!--<i class='fas fa-user' style="margin-left: 70px;" >
                    </i>-->

                    <?php 
                        
                            
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
        <div class="second">

            <!--<img src="assets/Asset 5.png" alt="logo-middle" style="width: 80px;height: 500px;" class="logo-middle">-->
            <div class="slider">
                <img src="assets/left-arrow.png" id="btn-prv" alt="arrow1">
                <img src="assets/right-arrow.png" id="btn-next" alt="arrow1">
                
                <div class="slide">
                    <img src="assets/overcooked2.jpg" id="dupe6" alt="food6-dupe">
                    <img src="assets/fifa.jpg" alt="food1">
                    <img src="assets/dbd.jpg" alt="food2">
                    <img src="assets/detroit.jpg" alt="food3">
                    <img src="assets/er.jpg" alt="food4">
                    <img src="assets/fallguys.jpg" alt="food5">
                    <img src="assets/overcooked2.jpg" alt="food6">
                    <img src="assets/fifa.jpg" id="dupe1" alt="food1">
                </div>

                <!--<button id="btn-prv">Previous</button>
                <button id="btn-next">Next</button>-->



                <script>
                    const powerSlide = document.querySelector('.slide')
                    const powerImg = document.querySelectorAll('.slide img')

                    const prvBtn = document.querySelector('#btn-prv')
                    const nextBtn = document.querySelector('#btn-next')

                    let i = 1;
                    const size = powerImg[0].clientWidth;

                    powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';

                    nextBtn.addEventListener('click',()=>{
                        if(i >= powerImg.length - 1) return
                        powerSlide.style.transition = "transform 0.5s ease-in-out";
                        i++;
                        powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';
                    });

                    prvBtn.addEventListener('click',()=>{
                        if(i <= 0) return
                        powerSlide.style.transition = "transform 0.5s ease-in-out";
                        i--;
                        powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';
                    });

                    powerSlide.addEventListener('transitionend', ()=>{
                        if(powerImg[i].id === 'dupe6'){
                            powerSlide.style.transition = "none";
                            i = powerImg.length - 2;
                            powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';
                        }
                        if(powerImg[i].id === 'dupe1'){
                            powerSlide.style.transition = "none";
                            i = powerImg.length - i;
                            powerSlide.style.transform = 'translateX(' + (-size * i) + 'px)';
                        }
                    });
                </script>
            </div>
        </div>
            <div class="large">
                <div class="small">
                    <p>Catalog</p>
                    <button onclick="window.location='membercatalog.php';" class="buttons">Show</button>
                </div>
                <div class="small2">
                    <p>About Us</p>
                    <button onclick="window.location='viewabout.php';" class="buttons">Show</button>
                </div>
            </div>
        
            <footer>
            <div class="content">
                <div class="row">
                    <div class="column">
                        <h4>Contact us</h4>
                        <ul>
                            <li><i class="fas fa-phone"></i>  06-755 8458</li>
                            <li><i class="fas fa-phone"></i>  06-261 9717</li>
                            <li><i class="fas fa-phone"></i>  06-221 5157</li>
                            
                        </ul>
                    </div>
                    <div class="column">
                        <h4>Sites</h4>
                        <ul>
                            <li><a href="index.php">Home</a></li> 
                            <li><a href="membercatalog.php">Menu</a></li> 
                            
                        </ul>
                    </div>
                </div>
            </div class="content">
            <div class="content2">
                <p>
                © 2022 GFG Sdn Bhd. All rights reserved. All trademarks are property of their respective owners in MY.
                </p>
            </div>
            </footer>
    </body>
</html>