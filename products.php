<!DOCTYPE html>
<html>

<head>
    <?php include 'default_head.php' ?>
    <title>GGWP | Products</title>
    <link rel="stylesheet" href="styles/perels.css">
    <script src="plugins/number-format/jquery.number.js"></script>
    <script src="scripts/products.js"></script>
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container mb-5" style="margin-top:84px;">
        <div class="row">
            <div class="col-md-2 col-xs-12">
                <ul class="list-group justify-content-center" style="list-style:none;">
                    <li class="button bg-transparent" onclick="filter('none')"><a href="#" class="list-text">ALL</a></li>
                    <li class="button bg-transparent" onclick="filter('Mouse')"><a href="#" class="list-text">MOUSE</a></li>
                    <li class="button bg-transparent" onclick="filter('Keyboard')"><a href="#" class="list-text">KEYBOARD</a></li>
                    <li class="button bg-transparent" onclick="filter('Headset')"><a href="#" class="list-text">HEADSET</a></li>
                    <li class="button bg-transparent" onclick="filter('Gamepad')"><a href="#" class="list-text">GAMEPAD</a></li>
                    <li class="button bg-transparent" onclick="filter('Accessories')"><a href="#" class="list-text">ACCESSORIES</a></li>
                    <li class="button bg-transparent" onclick="filter('Miscellaneous')"><a href="#" class="list-text">MISC.</a></li>
                </ul>
            </div>
            <div class="col-md-10 col-xs-12">
                <div class="card cardp">
                    <div class="row" id="productsRow">
                    </div>
                </div>
            </div>                       
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>