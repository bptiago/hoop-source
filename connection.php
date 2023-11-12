<?php
    $hostName = "localhost";
    $userName = "root";
    $password = "PUC@1234";
    $dbName = "teste";
    $port = "3306";
    $conn = new mysqli($hostName, $userName, $password, $dbName, $port);

    if ($conn->connect_error) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit(); 
    }
?>