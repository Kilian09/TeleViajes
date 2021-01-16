<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Universitarios</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body>

    <?php include "com/cabecera.php"?>

    <div>
        <div id="box-2">
            <h1 style="background: url(&quot;assets/img/ski.jpg&quot;) center / cover;">LOS MEJORES VIAJES</h1>
        </div>
        <div id="box-3">
            <h1 style="background: url(&quot;assets/img/Parques-atracciones-Portugal-.jpg&quot;);background-size: cover;">LAS MEJORES EXPERIENCIAS</h1>
        </div>
        <div id="box-1">
            <h1 style="background: url(&quot;assets/img/tomorrowland.jpg&quot;) center;">LAS MEJORES FIESTAS</h1>
        </div>



        <section class="text-center" style="margin-top: 20px;">
            <div class="d-flex flex-row multiple-item-slider">

                <?php
                if (isset($products, $universitarios)){
                foreach ($products as $product){
                if($product->type == "Universitarios"){
                foreach ($universitarios as $universitario){
                if($product->id == $universitario->id_product) {
                 ?>

                <div class="justify-content-center spacer-slider">
                    <figure class="figure"><img class="img-fluid figure-img" src="assets/img/ultra.jpg" width="2000" alt="alt text here">

                        <form method="get" action="/addCart/<?php echo $product->id ?>">
                        <figcaption class="figure-caption"><?php echo $universitario->name ?>
                           <button class="fa fa-shopping-cart" style="text-align: right;font-size: 20px;"></button>
                            <input type="number" name="amount" value="1" min="1">
                        </figcaption>
                        </form>

                    </figure>
                </div>
                <?php }}}}} ?>
        </section>



        <div class="carousel slide" data-ride="carousel" data-interval="10000" id="carousel-t">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="col-9 text-center mx-auto testimonial-content"><img class="rounded-circle" src="assets/img/test-man.jpg" width="100">
                        <p class="text-center rating">5&nbsp;<i class="icon ion-star"></i></p>
                        <p class="text-center" style="color: var(--dark);"><em>"No sabía esquiar, la única nieve estaba en mi nariz."</em><br></p>
                        <p class="signature" style="color: var(--gray);">Aitor Menta</p>
                        <p class="text-center date" style="color: var(--gray);">Viaje a la Nieve Abril 2014<br></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-9 offset-xl-1 text-center mx-auto testimonial-content"><img class="rounded-circle" src="assets/img/test-woman.jpg" width="100">
                        <p class="text-center rating">5&nbsp;<i class="fa fa-star"></i></p>
                        <p class="text-center" style="color: var(--gray);"><em>¡El mejor festival de mi vida sin duda repetire!.</em><br></p>
                        <p class="signature" style="color: var(--gray);">Mery Jane&nbsp;</p>
                        <p class="text-center date" style="color: var(--gray);">Viaje a Tomorrowland, April&nbsp; 2012<br></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-9 text-center mx-auto testimonial-content"><img class="rounded-circle" src="assets/img/test-man.jpg" width="100">
                        <p class="text-center rating">5&nbsp;<i class="fa fa-star"></i></p>
                        <p class="text-center" style="color: var(--gray);"><em>"El agua era tan transparente que no hacia falta gafas de buceo"</em><br></p>
                        <p class="signature" style="color: var(--gray);">John D.</p>
                        <p class="text-center date" style="color: var(--gray);">Viajo a Cancún, April 21, 2016<br></p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="col-9 offset-xl-1 text-center mx-auto testimonial-content"><img class="rounded-circle" src="assets/img/test-woman.jpg" width="100">
                        <p class="text-center rating">5&nbsp;<i class="fa fa-star"></i></p>
                        <p class="text-center" style="color: var(--gray);"><em>"El mejor clima del mundo"</em><br></p>
                        <p class="signature" style="color: var(--gray);">Jane D.</p>
                        <p class="text-center date" style="color: var(--gray);">Viajo a Canarias, Junio 21, 2014<br></p>
                    </div>
                </div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-t" role="button" data-slide="prev"><i class="icon ion-android-arrow-dropleft-circle d-flex d-lg-flex justify-content-center align-items-center"></i><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-t" role="button" data-slide="next"><i class="icon ion-android-arrow-dropright-circle d-flex d-lg-flex justify-content-center align-items-center"></i><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators" style="margin-right: 0; margin-left: 0">
                <li data-target="#carousel-t" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-t" data-slide-to="1"></li>
                <li data-target="#carousel-t" data-slide-to="2"></li>
                <li data-target="#carousel-t" data-slide-to="3"></li>
            </ol>
        </div>

    <?php include "com/pieDePagina.php"?>

</body>

</html>
