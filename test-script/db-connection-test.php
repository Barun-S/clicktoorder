<?php

$dbname = 'food-order';
$dbuser = 'root';
$dbpassword = '';
$dbhost = 'localhost';


$connect = mysqli_connect($dbhost, $dbuser, $dbpassword) or die("Unable to Connect to '$dbhost'");


mysqli_select_db($connect, $dbname) or die("Could not open the db '$dbname'");


if ($connect == True){
    echo "Connected Succesffully to the database";
}else{
    echo "Could not connect to the database server";
}

?>