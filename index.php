<!DOCTYPE html>
<html>
<head>
    <?php include 'default_head.php' ?>
    <title>GGWP | Home</title>
    <link rel="stylesheet" href="styles/index.css">
</head>

<body>
    <?php include 'header.php' ?>
    <div id="homeCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#homeCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#homeCarousel" data-slide-to="1"></li>
            <li data-target="#homeCarousel" data-slide-to="2"></li>
        </ol>
        <!-- Content -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="carousel-img" style="background-image: url('images/slide/s1.jpg')"></div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img" style="background-image: url('images/slide/s2.jpg')"></div>
            </div>
            <div class="carousel-item">
                <div class="carousel-img" style="background-image: url('images/slide/s3.jpg')"></div>
            </div>
        </div>
        <!-- Controls -->
        <a class="carousel-control-prev" href="#homeCarousel" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#homeCarousel" role="button" data-slide="next">
            <span class="carousel-control-next-icon"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div></div>
    <div class="container mt-5 mb-5">
        <div class="row text-center">
            <div class="col-md-4 col-12 pb-3">
                <a href="products.html?category=Mouse">
                    <img src="images/home/mouse.png">
                </a>
            </div>
            <div class="col-md-4 col-12 pb-3">
                <a href="products.html?category=Keyboard">
                    <img src="images/home/keyboard.png">
                </a>
            </div>
            <div class="col-md-4 col-12 pb-3">
                <a href="products.html?category=Headset">
                    <img src="images/home/headset.png">
                </a>
            </div>
        </div>
    </div>
    <?php include 'footer.php' ?>
</body>

</html>