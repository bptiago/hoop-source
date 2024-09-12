<?php
    $hostName = "localhost";
    $userName = "root";
    $password = "";
    $dbName = "hoopsource";
    $port = "3306";
    $conn = new mysqli($hostName, $userName, $password, $dbName, $port);

    if ($conn->connect_error) {
        echo "Failed to connect to MySQL: " . $conn->connect_error;
        exit(); 
    }
?>