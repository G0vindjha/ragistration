<?php 
    $servername = "localhost";
    $username = "root";
    $db_password = "Govind@1990"; // Changed the variable name to avoid conflict
    $dbname = "ragistration"; // Corrected the database name

    $conn = new mysqli($servername, $username, $db_password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }
