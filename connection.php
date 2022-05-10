<?php 

    //Define database credentials

    define('DB_SERVER','localhost');
    define('DB_USERNAME','root');
    define('DB_PASSWORD','');
    define('DB_NAME','gfg');

    // create connection
    $mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

    //check connnection
    if($mysqli === false){
        die("connection failed" . $mysqli->connect_error);
    }

?>