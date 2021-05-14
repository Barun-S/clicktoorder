<?php


$dbhost = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "food-order";

try {
    $conn = new PDO("mysql:host=$dbhost; dbname=$dbname", $dbusername, $dbpassword);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    echo "Connected successfully";
    }

catch(PDOException $e)
    {
    echo "Connection failed: " . $e->getMessage();
    }

?>