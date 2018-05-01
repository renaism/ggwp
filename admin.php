<!DOCTYPE html>
<html>

<head>
    <?php include 'default_head.php' ?>    
    <title>GGWP | Product Manager</title>
    <script src="scripts/product_manager.js"></script>
    <link rel="stylesheet" href="styles/product_manager.css">
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container">
        <a href="manage_product_add.php">
            <button class="btn btn-primary">+ Add Product</button>
        </a>
        <div class="row" id="productListing">
            <div class="col-sm-4 col-xs-12 mb-3">
                <div class="list-group" id="productCategories">
                    <button type="button" class="list-group-item list-group-item-action active" id="catAllBtn">All</button>
                    <button type="button" class="list-group-item list-group-item-action" id="catKeyboardBtn">Keyboard</button>
                    <button type="button" class="list-group-item list-group-item-action" id="catMouseBtn">Mouse</button>
                    <button type="button" class="list-group-item list-group-item-action" id="catGamepadBtn">Gamepad</button>
                    <button type="button" class="list-group-item list-group-item-action" id="catHeadsetBtn">Headset</button>
                    <button type="button" class="list-group-item list-group-item-action" id="catAccessoriesBtn">Accessories</button>
                    <button type="button" class="list-group-item list-group-item-action" id="catMiscellaneousBtn">Miscellaneous</button>
                </div>
            </div>
            <div class="col-sm-8 col-xs-12">
                <div class="list-group" id="productList">
                    <!--
                    <a href="#" class="list-group-item list-group-item-action">Headset Meka</a>
                    <a href="#" class="list-group-item list-group-item-action">Fidget Spinner</a>
                    <a href="#" class="list-group-item list-group-item-action">Maicih level 3</a>
                    <a href="#" class="list-group-item list-group-item-action">Bumi itu bulat</a> 
                    -->
                </div>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>