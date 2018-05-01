<?php
    if(isset($_POST["signup"])) {
        include_once 'db.php';
        $username = $db->real_escape_string($_POST["username"]);
        $password = $db->real_escape_string($_POST["password"]);
        $fname = $db->real_escape_string($_POST["fname"]);
        $lname = $db->real_escape_string($_POST["lname"]);
        $email = $db->real_escape_string($_POST["email"]);
        $phone = $db->real_escape_string($_POST["phone"]);
        $pict = $db->real_escape_string($_POST["profilepicture"]);

        $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password');";
        $db->query($sql);
        $sql = "SELECT id FROM users WHERE username='$username';";
        $query = $db->query($sql);
        $row = $query->fetch_assoc();
        $id = $row["id"];

        $sql = "INSERT INTO userdetails (id, fname, lname, email, phone, profilepicture) VALUES ('$id', '$fname', '$lname', '$email', '$phone', '$pict');";
        $db->query($sql);
    }

    ob_start();
    header("location: index.php");
    ob_end_flush();
    die();
?>