<?php 
    DB_SERVER = "localhost";
    DB_USERNAME = "root";
    DB_PASSWORD = "";
    DB_NAME = "ggwp";

    $db = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
    // Check connection
    if ($db->connect_error) {
        die("Connection failed: " . $db->connect_error);
    } 
    echo "Connected successfully";
?>
