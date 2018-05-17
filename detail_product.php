<?php 
    require_once "db.php"; 
?>  
<!DOCTYPE html>
<html>
<head>
    <?php include 'default_head.php' ?>
    <?php
        if(isset($_GET["id"])) {
            $id = $_GET["id"];
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
            else {
                header("location: products.php");
            }
        }
        else {
            header("location: products.php");
        }
    ?>
    <title>GGWP</title>
    <script src="plugins/number-format/jquery.number.js"></script>
    <link rel="stylesheet" href="styles/detail_product.css">
    <script src="scripts/detail_product.js"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container" style="margin-top:80px;">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <img class="img-fluid" id="image" src="images/19.jpg">
            </div>
            <div class="col-md-4 col-xs-12">
                <p id="category">Category: <?= $category ?></p>
                <p id="name"><?= $name ?></p>
                <p id="price">IDR <?= $price ?></p>
                <p id="description"><?= $description ?></p>
                <p>
                    <form>
                        <div class="form-row">
                            <div class="form-group col-sm-3 col-12">
                                <button class="btn btn-success navbar-btn">Buy Now</button>
                            </div>
                            <div class="form-group col-sm-9 col-12 pl-3">
                                <input type="number" class="form-control w-50" id="qtyInput" placeholder="Quantity">
                            </div>
                        </div>
                    </form>
                </p>
            </div>
        </div>
    </div>
    <ul class="nav nav-tabs justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" onclick="showOverview()" id="overviewTab">Overview</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" onclick="showSpecifications()" id="specificationsTab">Spesification</a>
        </li>
    </ul>

    <div class="container" id="spek" style="margin-top:56px;">
        <div class="row" id="overview">
            <div class="col" id="details">
                <?= $details ?>
            </div>
        </div>

        <div class="row" id="specifications">
            <div class="col" id="specs">
                <?= $specifications ?>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>