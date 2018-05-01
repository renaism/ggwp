<?php
    include_once "db.php";
    if(isset($_POST["create"]) || isset($_POST["update"])) {
        $name = $db->real_escape_string($_POST["name"]);
        $brand = $db->real_escape_string($_POST["brand"]);
        $category = $db->real_escape_string($_POST["category"]);
        $price = $db->real_escape_string($_POST["price"]);
        $description = $db->real_escape_string($_POST["description"]);
        $details = $db->real_escape_string($_POST["details"]);
        $specifications = $db->real_escape_string($_POST["specifications"]);
        $image = $db->real_escape_string($_POST["image"]);

        if(isset($_POST["create"])) {
            $sql = "INSERT INTO products (name, brand, category, price, description, details, specifcations, image) VALUES ('$name', '$brand', '$category', '$price', '$description', '$details', '$specifications', '$image');";
        }

        if(isset($_POST["update"])) {
            $id = $_POST["id"];
            echo $id;
            $sql = "UPDATE products SET name='$name', brand='$brand', category='$category', price='$price', description='$description', details='$details', specifications='$specifications', image='$image' WHERE id='$id';";
        }
        echo $sql;
        $db->query($sql);
    }

    elseif(isset($_POST["delete"])) {
        $id = $db->real_escape_string($_POST["id"]);
        $sql = "DELETE FROM products WHERE id='$id'";
        $db->query($sql);
    }

    ob_start();
    header("location: admin.php");
    ob_end_flush();
    die();
?>