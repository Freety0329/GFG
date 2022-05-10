<!DOCTYPE html>
<html lang="en">
  <?php
  include 'navbaradmin.php';
  ?>
  <style>
    body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Oxygen,
    Ubuntu, Cantarell, "Open Sans", "Helvetica Neue", sans-serif;
}

h1 {
  margin: 0 auto;
  width: fit-content;
  padding: 0;
}
input {
  position: relative;
  bottom: 0px;
  width: fit-content;
  padding: 10px;
  height: fit-content;
  margin: auto;
  color: black;
	border: none;
	background-color: #fafafa;
  border-radius: 20px;
  cursor: pointer;
  
}

.header {
  width: 100%;
  height: 100px;
  border-radius: 20px;
  background-color: black;
  text-align: center;
  color: white;
}

.body-section {
  display: flex;
  margin: 10px 10px;
}

.sidebar {
  width: 15%;
  height: 530px;
  border-radius: 20px;
  background-color: darkgreen;
  text-align: center;
  color: white;
}

.s2 {
  background-color: darkred;
}
.outer{
  height: 530px;
  width: 68%;
}
.main-body {
  width: 95%;
  height: 330px;
  border-radius: 20px;
  background-color: yellow;
  text-align: center;
  margin: 0 auto;
}

.main-body2 {
  width: 95%;
  height: 165px;
  border-radius: 20px;
  background-color: yellow;
  text-align: center;
  margin: 0 auto;
}

.footer {
  width: 100%;
  height: 80px;
  border-radius: 20px;
  background-color: darkblue;
  text-align: center;
  color: white;
}

@media (max-width: 770px) {
  .body-section {
    display: block;
  }
  .main-body {
    width: 100%;
    height: 340px;
    margin: 10px 0 10px 0;
  }
  .sidebar {
    width: 100%;
    height: 70px;
    text-align: center;
  }
}

  </style>
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Page</title>
  </head>
  <body>
    <div class="header">
      <h1>Welcome, Admin !</h1>
      <a href="viewaccounte.php">
						<input type="button" value="Account">
          </a>
    </div>
    <div class="body-section">
      <div class="sidebar">
        <br>
        <h1>REPORT</h1>
        <br>
        <div class="field">
        <a href="viewreceipt.php">
						<input type="button" value="View Receipt">
        </a>  
        <br>
        <br>
        <a href="generatereport.php">
						<input type="button" value="Generate Report">
        </a>  
        </div>
      </div>
      <div class="outer">
        <div class="main-body">
          <p>
            Background
          </p>
          <p1>
            Game For Gamers, in short GFG, is one among popular video game 
            retail company. We provide large number of video games from di
            stinct categories as well as different video game consoles and
            allow customers to view feedbacks and rating for each video g
            ame on sale. We begin since 2006 as small store which provide
            hard copy of PS3 video games. As the business develops through
            our continuous effort, the product line had expanded to includ
            e a large variety of video games available on different video 
            game consoles. Today, GFG has succeed to accomplish part of it
            s vision and had growth into one among popular trusted video g
            ame retail company.
          </p1>
          <br><br>
            <a href="editcompanyhistory.php">
              <input type="button" value="Edit Company History">
            </a>
            <br>
            <br>
        </div>
          <div class="main-body2">
            <p>Game</p>
            <a href="viewgamee.php">
              <input type="button" value="Edit Game">
            </a>
            <br>
            <br>
            <a href="addgame.php">
              <input type="button" value="Add Game">
            </a>
          </div>
      </div>
      <div class="sidebar s2">
        <br>
        <h1>Publisher</h1>
        <br>
        <a href="viewsupplier.php">
						<input type="button" value="View Publisher Details">
        </a>
        <br>
        <br>
        <a href="addpublisher.php">
						<input type="button" value="Add Publisher">
        </a>
      </div>
    </div>
    <footer >
      <div class="footer">
        <h1>SALES</h1>
        <a href="viewsales.php">
						<input type="button" value="View Sales">
        </a>
      </div>
    </footer>
  </body>
</html>
