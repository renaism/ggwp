<?php
    if(isset($_POST["signin"])) {
        include_once 'db.php';
        $uname = $_POST["username"];
        $pass = $_POST["password"];

        $sql = "SELECT id, username FROM users WHERE username='$uname' AND password='$pass';";
        $query = $db->query($sql);
        if($query->num_rows == 1) {
            $username = $uname;
            $fname = "";
            $lname = "";
            $sql = "SELECT fname, lname FROM userdetails WHERE id='$id';";
            $query = $db->query($sql);
            if($query->num_rows == 1) {
                $row = $query->fetch_assoc();
                $fname = $row["fname"];
                $lname = $row["lname"];
            }

            session_start();
            $_SESSION["username"] = $username;
            ob_start();
            header("location: index.php");
            ob_end_flush();
        }
        else {
            ob_start();
            header("location: signin.php");
            ob_end_flush();
        }
    }
    die();
?>