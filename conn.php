<?php
$con=mysqli_connect("localhost", "root", "", "gfg");

//Check connection
if (mysqli_connect_errno())
{
    echo"Falied to connect to MySQL:". mysqli_connect_error();
}
?>