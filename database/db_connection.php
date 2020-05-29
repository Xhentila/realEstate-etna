<?php 
    $db_host = 'localhost';
    $username = 'root';
    $password = '';
    $db_name = 'etnaestate';

    $con = mysqli_connect($db_host, $username, $password,$db_name);

    if(mysqli_connect_error())
    {
        die("No DataBase Connection");
    }


?>