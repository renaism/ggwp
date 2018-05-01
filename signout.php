<?php
    session_unset();
    session_destroy();
    ob_start();
    header("location: index.php");
    ob_end_flush();
    die();
?>