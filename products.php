<!DOCTYPE html>
<html>

<head>
    <title>GGWP</title>
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <link rel="stylesheet" href="styles/perels.css">
    <link rel="stylesheet" href="styles/main.css">
    <link href="https://use.fontawesome.com/releases/v5.0.8/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Raleway" rel="stylesheet">
    <script src="plugins/number-format/jquery.number.js"></script>
    <script src="scripts/header_footer.js"></script>
    <script src="scripts/products.js"></script>
</head>

<body>
    <div id="header"></div>
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
    <div id="footer"></div>
</body>

</html>