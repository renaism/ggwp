<!DOCTYPE html>
<html>

<head>
    <?php include 'default_head.php' ?>    
    <title>GGWP</title>
    <script src="plugins/number-format/jquery.number.js"></script>
    <script src="scripts/detail_product.js"></script>
    <link rel="stylesheet" href="styles/detail_product.css">
</head>

<body>
    <?php include 'header.php' ?>
    <div class="container" style="margin-top:80px;">
        <div class="row">
            <div class="col-md-8 col-xs-12">
                <img class="img-fluid" id="image" src="images/19.jpg">
            </div>
            <div class="col-md-4 col-xs-12">
                <p id="category">Category:</p>
                <p id="name">Thresher Ultimate PS4 headset</p>
                <p id="price">IDR 1.000.000</p>
                <p id="description">DESCRIPTION</p>
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
            </div>
        </div>

        <div class="row" id="specifications">
            <div class="col" id="specs">
            </div>
        </div>
        <div class="row mt-5 mb-5">
            <img src="images/20.jpg" class="col-3 zoom">
            <img src="images/21.jpg" class="col-3 zoom">
            <img src="images/22.jpg" class="col-3 zoom">
            <img src="images/23.jpg" class="col-3 zoom">
        </div>
    </div>

    <?php include 'footer.php' ?>
</body>

</html>