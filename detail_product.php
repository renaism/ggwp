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
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container" style="margin-top:80px;">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <img class="img-fluid" id="image" src=<?= "'$image'" ?> >
            </div>
            <div class="col-md-4 col-xs-12">
                <p id="category">Category: <?= $category ?></p>
                <p id="name"><?= $name ?></p>
                <p id="price"><?= $price ?></p>
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
    <ul class="mt-5 nav nav-tabs justify-content-center">
        <li class="nav-item">
            <button class="tab-content nav-link active" onclick="showOverview()" id="overviewTab">Overview</button>
        </li>
        <li class="nav-item">
            <button class="tab-content nav-link" onclick="showSpecifications()" id="specificationsTab">Spesification</button>
        </li>
    </ul>

    <div class="container mb-5" id="spek" style="margin-top:56px;">
        <div class="row" id="overview">
            <div class="col" id="details">
                <h2>Product Details</h2>
                <p><?= $details ?></p>
            </div>
        </div>

        <div class="row" id="specifications">
            <div class="col" id="specs">
                <h2>Product Specifcations</h2>
                <p><?= $specifications ?></p>
            </div>
        </div>
    </div>

    <?php include 'footer.php' ?>
    <script>
        function showOverview() {
            $("#overviewTab").addClass("active");
            $("#specificationsTab").removeClass("active");
            $("#specifications").hide();
            $("#overview").show();
            $("#overview").ready();
        }

        function showSpecifications() {
            $("#specificationsTab").addClass("active");
            $("#overviewTab").removeClass("active");
            $("#overview").hide();
            $("#specifications").show();
        }

        $("document").ready(function() {
            $("#price").text("Rp " + $.number($("#price").text(), 0, ',', '.') + ",-");
            $("#specifications").hide();
        });
    </script>
</body>

</html>