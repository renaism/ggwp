<?php 
    require_once "user.php";
    if(!isset($admin)) {
        header("Location: signin_admin.php");
        exit;
    }
    require_once "db.php";
    $name = "";
    $brand = "";
    $category = "";
    $price = "";
    $description = "";
    $details = "";
    $specifications = "";
    $image = "";
    include_once "admin_crud.php";
    
    if(isset($_POST["update"])) {
        $id = $_POST["id"];
        $sql = "SELECT name, brand, category, price, description, details, specifications, image FROM products WHERE id='$id';";
        $query = $db->query($sql);
        if($query->num_rows == 1) {
            $row = $query->fetch_assoc();
            $name = $row["name"];
            $brand = $row["brand"];
            $category = $row["category"];
            $price = $row["price"];
            $description = $row["description"];
            $details = $row["details"];
            $specifications = $row["specifications"];
            $image = $row["image"];
        }
        
    }
?>  
<!DOCTYPE html>
<html>
<head>
    <?php include 'default_head.php' ?>
    <title>GGWP | Add a Product</title>
    <script src="scripts/products-crud.js"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container" style="margin-top:90px">
        <h1>Add a Product</h1>
        <form method="POST" enctype="multipart/form-data" class="mb-3">
            <div class="form-group">
                <label for="productNameInput">Product Name</label>
                <input type="text" class="form-control" name="name" placeholder="Enter Name" value=<?="'$name'"?> requierd>
            </div>
            <div class="form-row">
                <div class="col-md-6 col-xs-12">
                    <div class="form-group">
                        <label for="brandInput">Brand</label>
                        <input type="text" class="form-control" name="brand" placeholder="Enter Brand" value=<?="'$brand'"?> requierd>
                    </div>
                    <div class="form-group">
                        <label for="categoryInput">Category</label>
                        <select class="custom-select" name="category" required>
                            <option value="Keyboard" <?php if($category == "Keyboard") echo "selected" ?> >Keyboard</option>
                            <option value="Mouse" <?php if($category == "Mouse") echo "selected" ?>>Mouse</option>
                            <option value="Gamepad" <?php if($category == "Gamepad") echo "selected" ?>>Gamepad</option>
                            <option value="Headset" <?php if($category == "Headset") echo "selected" ?>>Headset</option>
                            <option value="Accessories" <?php if($category == "Accessories") echo "selected" ?>>Accessories</option>
                            <option value="Miscellaneous" <?php if($category == "Miscellaneous") echo "selected" ?>>Miscellaneous</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="priceInput">Price</label>
                        <div class="input-group">
                            <div class="input-group-prepend">
                                <span class="input-group-text">Rp.</span>
                            </div>
                            <input type="number" class="form-control" name="price" placeholder="Enter Price" value=<?="'$price'"?> required>
                        </div>
                    </div>
                </div>
                <div class="form-group col-md-6 col-xs-12">
                    <label for="descriptionInput">Product Description (Summary)</label>
                    <textarea class="form-control" name="description" rows="8" placeholder="Enter Description"><?=$description?></textarea>
                </div>
            </div>
            <div class="form-group">
                <label for="detailsInput">Product Details</label>
                <textarea class="form-control" name="details" rows="8" placeholder="Enter Details"><?=$details?></textarea>
            </div>
            <div class="form-group">
                <label for="specificationsInput">Product Specifications</label>
                <textarea class="form-control" name="specifications" rows="8" placeholder="Enter Specifications"><?=$specifications?></textarea>
            </div>
            <!-- <div class="form-group">
                <label for="imagesInput">Product Image</label>
                <input type="text" class="form-control" name="old-image" value=<?="'$image'"?> placeholder="Enter Image URL">
            </div> -->
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="image-file" name="image">
                <label class="custom-file-label" id="image-label" for="customFile">Choose image</label>
            </div>
            <?php
                if(isset($_POST["update"])) { 
            ?>
                    <input type=hidden value=<?="'$id'"?> name="id">
                    <button type="submit" class="btn btn-primary mt-2" name="update-product">Update Product</button>
            <?php
                }
                else {
            ?>
                    <button type="submit" class="btn btn-primary mt-2" name="create-product">Add Product</button>
            <?php
                }
            ?>
            <a href="admin.php">
                <button type="button" class="btn btn-danger mt-2">Cancel</button>
            </a>
        </form>
    </div>
    <?php include 'footer.php' ?>
    <script>
        $("#image-file").change(function() {
            $("#image-label").text($(this).val());
        });
    </script>
</body>
</html>