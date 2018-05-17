<?php
    session_start();
    if(isset($_SESSION["id"], $_SESSION["username"])) {
        $username = $_SESSION["username"];
        $userid = $_SESSION["id"];
        if(isset($_SESSION["admin"])) {
            $admin = $_SESSION["admin"]; 
        }
    }
?>