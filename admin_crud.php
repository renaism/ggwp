<?php
    function openAdminPanel() {
        ob_start();
        header("location: admin.php");
        ob_end_flush();
        die();
    }
    
    //require_once "db.php";
    if(isset($_POST["create-product"]) || isset($_POST["update-product"])) {
        $name = trim($_POST["name"]);
        $brand = trim($_POST["brand"]);
        $category = $_POST["category"];
        $price = trim($_POST["price"]);
        $description = trim($_POST["description"]);
        $details = trim($_POST["details"]);
        $specifications = trim($_POST["specifications"]);
        //$image = trim($_POST["image"]);

        if(isset($_POST["create-product"])) {
            $sql = "INSERT INTO products (name, brand, category, price, description, details, specifications) VALUES ('$name', '$brand', '$category', '$price', '$description', '$details', '$specifications');";
            $result = $db->query($sql);
            if($result) {
                $id = $db->insert_id;
            }
            else {
                $errMsg = "Failed to insert the product to the database.";
            }
        }

        if(isset($_POST["update-product"])) {
            $id = $_POST["id"];
            $sql = "UPDATE products SET name='$name', brand='$brand', category='$category', price='$price', description='$description', details='$details', specifications='$specifications' WHERE id='$id';";
            $result = $db->query($sql);
            if(!$result) {
                $errMsg = "Failed to update the product to the database.";
            }
        }


        if($result && isset($_FILES["image"])) {
            $file_ext = strtolower(pathinfo(basename($_FILES["image"]["name"]), PATHINFO_EXTENSION));
            $target_dir = "products-img/";
            $target_file = $target_dir . $id . "." . $file_ext;
            echo $_FILES["image"]["name"] . "<br>";
            echo $file_ext . "<br>";
            echo $target_file . "<br>";
            $uploadOk = TRUE;

            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if(!$check) {
                $uploadOk = FALSE;
                $errMsg = "Warning: Image isn't uploaded. Image is not a vaild file.";
            }

            if($_FILES["image"]["size"] > 5000000) {
                $uploadOk = FALSE;
                $errMsg = "Warning: Image isn't uploaded. Image is too large.";
            }

            if($file_ext != "jpg" && $file_ext != "png" && $file_ext != "jpeg") {
                $uploadOk = FALSE;
                $errMsg = "Warning: Image isn't uploaded. Only JPG, JPEG, and PNG images are allowed. Your image: ". $_FILES["image"]["name"];
            }

            if($uploadOk) {
                $uploaded = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                if($uploaded) {
                    $db->query("UPDATE products SET image='$target_file' WHERE id='$id'");
                }
                else {
                    $errMsg = "Warning: Image isn't uploaded. Failed to upload to the database.";
                }
            }
        }

        if($result) {
            $_SESSION["error"] = $errMsg;
            openAdminPanel();
        }
    }

    elseif(isset($_POST["delete"])) {
        $id = $_POST["id"];
        $sql = "DELETE FROM products WHERE id='$id'";
        $db->query($sql);
    }

    elseif(isset($_POST["msgDelete"])) {
        $msgId = $_POST["msgId"];
        $db->query("DELETE FROM messages WHERE id='$msgId'");
    }
?>