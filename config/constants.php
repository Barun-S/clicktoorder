<?php 
    //Start Session
    session_start();


    //Some importance costant values that are used throughout our website
    define('SITEURL', 'http://localhost/clicktoorder/');
    define('LOCALHOST', 'localhost');
    define('DB_USERNAME', 'root');
    define('DB_PASSWORD', '');
    define('DB_NAME', 'food-order');
    
    $conn = mysqli_connect(LOCALHOST, DB_USERNAME, DB_PASSWORD) or die(mysqli_error()); //Database Connection Check
    $db_select = mysqli_select_db($conn, DB_NAME) or die(mysqli_error()); //Selecting Database of our click to order website


?>