<?php

    session_start();

    define('SITEURL','http://localhost/Test1/');
    define('LOCAlHOST','localhost');
    define('DB_USERNAME','root');  
    define('DB_PASSWORD','');  
    define('DB_NAME','Test1');

$conn = mysqli_connect(LOCAlHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); 
$db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error());

?>