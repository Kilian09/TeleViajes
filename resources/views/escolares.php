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

<div class="shopping-grid">
    <div class="container">
        <h3 class="" align="center">Viajes de Invierno</h3>
        <div class="row">

<?php
if (isset($products, $escolares)){
    foreach ($products as $product){
        if($product->type == "Escolares"){
            foreach ($escolares as $escolar){
                if($product->id == $escolar->id_product) {
                    if($escolar->type == "Invierno"){?>


                    <div class="col-md-3 col-sm-6">
                        <div class="product-grid7">
                            <div class="product-image7">
                                    <img class="pic-1" src="assets/img/amsterdam.jpg">
                                    <img class="pic-2" src="assets/img/barriorojo.jpg">
                                <ul class="social">

                                    <form method="get" action="/addCart/<?php echo $product->id ?>">
                                        <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                        <input type="hidden" name="amount" value="1" min="1">
                                    </form>

                                </ul>
                                <span class="product-new-label">New</span>
                            </div>

                            <div class="product-content">
                                <h3 class="title"><a href="#"><?php echo $escolar->name ?></a></h3>
                                <ul class="rating">
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                    <li class="fa fa-star"></li>
                                </ul>
                                <div class="price"><?php echo $escolar->price?>€ </div>

                            </div>
                        </div>
                    </div>


<?php }}}}}} ?>

        </div>
    </div>
</div>

<div data-bs-parallax-bg="true" style="height: 500px;background: url(&quot;assets/img/xiquillos.jpg&quot;) center / cover;"></div>

<div class="shopping-grid">
    <div class="container">
        <h3 class="" align="center">Viajes de Fin de Curso</h3>
        <div class="row">
            <?php
            if (isset($products, $escolares)){
            foreach ($products as $product){
            if($product->type == "Escolares"){
            foreach ($escolares as $escolar){
            if($product->id == $escolar->id_product)
                if($escolar->type == "Verano"){{
                ?>

            <div class="col-md-3 col-sm-6">
                <div class="product-grid7">
                    <div class="product-image7">
                            <img class="pic-1" src="assets/img/amsterdam.jpg">
                            <img class="pic-2" src="assets/img/barriorojo.jpg">

                        <ul class="social">

                            <form method="get" action="/addCart/<?php echo $product->id ?>">
                                <li><button type="submit"><i class="fa fa-shopping-cart"></i></button></li>
                                <input type="hidden" name="amount" value="1" min="1">
                            </form>

                        </ul>
                        <span class="product-new-label">New</span>
                    </div>
                    <div class="product-content">
                        <h3 class="title"><a href="#"><?php echo $escolar->name ?></a></h3>
                        <ul class="rating">
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                        <div class="price"><?php echo $escolar->price?>€</div>
                    </div>
                </div>
            </div>

            <?php }}}}}} ?>

        </div>
    </div>
</div>

<?php include "com/pieDePagina.php"?>

</body>
</html>
