<?php 
    require_once "db.php"; 
?>  
<!DOCTYPE html>
<html>
<head>
    <?php include 'default_head.php' ?>
    <title>GGWP | Products</title>
    <link rel="stylesheet" href="styles/products.css">
    <script src="plugins/number-format/jquery.number.js"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container mb-5" style="margin-top:84px;">
        <div class="row">
            <div class="col-md-2 col-xs-12">
                <ul class="list-group justify-content-center" style="list-style:none;">
                    <li class="button bg-transparent"><a href="products.php" class="list-text">ALL</a></li>
                    <li class="button bg-transparent"><a href="products.php?category=Mouse" class="list-text">MOUSE</a></li>
                    <li class="button bg-transparent"><a href="products.php?category=Keyboard" class="list-text">KEYBOARD</a></li>
                    <li class="button bg-transparent"><a href="products.php?category=Headset" class="list-text">HEADSET</a></li>
                    <li class="button bg-transparent"><a href="products.php?category=Gamepad" class="list-text">GAMEPAD</a></li>
                    <li class="button bg-transparent"><a href="products.php?category=Accessories" class="list-text">ACCESSORIES</a></li>
                    <li class="button bg-transparent"><a href="products.php?category=Miscellaneous" class="list-text">MISC.</a></li>
                </ul>
            </div>
            <div class="col-md-10 col-xs-12">
                <div class="card cardp">
                    <div class="row" id="productsRow">
                        <?php 
                            if(isset($_GET["category"])) {
                                $catfiler = $_GET["category"];
                                $filter = " WHERE category='$catfiler'";
                            }
                            else {
                                $filter = "";
                            }
                            $sql = "SELECT id, name, price, category FROM products$filter";
                            $query = $db->query($sql);
                            if($query->num_rows > 0) {
                                while($row = $query->fetch_assoc()) {
                                    $cat = $row["category"];
                                    if ($cat== "Mouse") {
                                        $imglink = "products-img/mouse.png";
                                    }
                                    elseif ($cat == "Keyboard") {
                                        $imglink = "products-img/keyboard.png";
                                    }
                                    elseif ($cat == "Headset") {
                                        $imglink = "products-img/headset.png";
                                    }
                                    elseif ($cat == "Gamepad") {
                                        $imglink = "products-img/gamepad.png";
                                    }
                                    elseif ($cat == "Accessories") {
                                        $imglink = "products-img/acc.png";
                                    }
                                    else {
                                        $imglink = "products-img/misc.png";
                                    }
                        ?>
                                    <div class="col-sm-4 ">
                                        <div class="card carding zoom">
                                            <div class="card-body">
                                                <img class="card-img-top" src=<?="'$imglink'"?> alt="Card image cap">
                                            </div>
                                            <a href=<?= "'" . "detail_product.php?id=" . $row['id'] . "'" ?> class="card-link cardtext"> <?= $row["name"] ?> </a>
                                            <div class="price"><?= $row["price"] ?></div>
                                        </div>
                                    </div>
                        <?php
                                }
                            }
                            else {
                        ?>
                            <p>No product found</p>
                        <?php } ?>
                    </div>
                </div>
            </div>                       
        </div>
    </div>
    <?php include 'footer.php' ?>
    <script>
        $(document).ready(function() {
            $(".price").each(function(i, p) {
                $(p).text("Rp " + $.number($(p).text(), 0, ',', '.') + ",-");
            });
        });
    </script>
</body>

</html>