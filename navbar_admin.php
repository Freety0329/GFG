<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <style>
            a.aa {
                float: left;
                font-size: 25px;
                text-align: center;
                display: block;
                padding: 0px 16px;
                color: white;
                text-decoration: none;
            }
            .navigation-bar {
                overflow: hidden;
                width: 100%;  /* i'm assuming full width */
                height: 75px; /* change it to desired width */
                background-color: #333; /* change to desired color */
            }
            .navigation-bar > a {
                display: inline-block;
                vertical-align: top;
                margin-right: 20px;
                height: 80px;        /* if you want it to take the full height of the bar */
                line-height: 80px;
            }
            .logo {
                float: left;
                display: inline-block;
                vertical-align: top;
                width: 70px;
                height: 70px;
                margin-left :25px;
                margin-right: 20px;
                margin-top: 5px;    /* if you want it vertically middle of the navbar. */
            }
            a.aa:hover,a.b:hover{
                height: 74px;
                background-color: #111;
            }
            a.b {
                float: right;
                font-size: 25px;
                text-align: center;
                display: block;
                padding: 0px 16px;
                color: white;
                text-decoration: none;
            }
            body{
                margin:0px;
            }
        </style>
    </head>
    <body>
        <div class ="navigation-bar">
                <img class = "logo" src="image/logo.png">
                    <a href="adminpage.php" class="aa">Home</a>
                    <a href="viewaccounte.php" class="aa">View Accounts</a>
                    <a href="viewgamee.php" class="aa">View Games</a>
                    <a href="viewsupplier.php" class="aa">View Supplier</a>
                    <a href="logout.php" class="b">Logout</a>   
            </div>
    </body>
</html>