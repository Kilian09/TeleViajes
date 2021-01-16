<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TELEVIAJES 2</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>


</head>

<body>
<?php include "com/cabecera.php"?>

<?php
if (isset($products, $escolares)){
    foreach ($products as $product){
        if($product->type == "Escolares"){
            foreach ($escolares as $escolar){
                if($product->id == $escolar->id_product) { ?>

<section id="carousel">
    <div class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner">
            <div class="carousel-item">
                <div class="jumbotron pulse animated hero-technology carousel-hero" style="background: url(&quot;assets/img/estaciones-esqui-ninos.jpg&quot;) center;">
                    <h1 class="hero-title" style="display: block"><?php echo $escolar->name ?> </h1>
                    <p class="hero-subtitle"><?php echo $escolar->description ?> </p>
                    <p><a class="btn btn-primary hero-button plat" role="button" href="#">Comprar</a></p>
                </div>
            </div>
        </div>

        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
        <ol class="carousel-indicators" style="width: 100%; text-align: center; margin-left: 0;">
            <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2"></li>
        </ol>
    </div>
</section>

<?php }}}}} ?>

<div data-bs-parallax-bg="true" style="height: 500px;background: url(&quot;assets/img/xiquillos.jpg&quot;) center / cover;"></div>

<div class="shopping-grid">
    <div class="container">
        <h3 class="" align="center">Últimos Productos</h3>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="product-grid7">
                    <div class="product-image7">
                        <a href="#">
                            <img class="pic-1" src="assets/img/amsterdam.jpg">
                            <img class="pic-2" src="assets/img/barriorojo.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" class="fa fa-shopping-cart"></a></li>
                        </ul>
                        <span class="product-new-label">New</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Amsterdam</a></h3>
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                        <div class="price">150.00€
                            <span>200.00€</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid7">
                    <div class="product-image7">
                        <a href="#">
                            <img class="pic-1" src="assets/img/London.jpg">
                            <img class="pic-2" src="assets/img/london2.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" class="fa fa-shopping-cart"></a></li>
                        </ul>
                        <span class="product-new-label">New</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Londres</a></h3>
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                        <div class="price">225.00€</div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid7">
                    <div class="product-image7">
                        <a href="#">
                            <img class="pic-1" src="assets/img/madrid.jpg">
                            <img class="pic-2" src="assets/img/berna.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" class="fa fa-shopping-cart"></a></li>
                        </ul>
                        <span class="product-new-label">New</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Madrid</a></h3>
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                        <div class="price">305.00€
                            <span>400.00€</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="product-grid7">
                    <div class="product-image7">
                        <a href="#">
                            <img class="pic-1" src="assets/img/varsovia.jpg">
                            <img class="pic-2" src="assets/img/warsaw.jpg">
                        </a>
                        <ul class="social">
                            <li><a href="" class="fa fa-shopping-cart"></a></li>
                        </ul>
                        <span class="product-new-label">New</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#">Varsovia</a></h3>
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                        <div class="price">100.00€
                            <span>120.00€</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "com/pieDePagina.php"?>


</body>

</html>
