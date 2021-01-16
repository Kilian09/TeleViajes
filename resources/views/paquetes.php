<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Paquetes</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body style="background: url(&quot;assets/img/intro-bg.jpg&quot;), #c9c9c9;">

    <?php include "com/cabecera.php"?>

    <div class="container" style="margin-top: 8px;">
        <div class="carousel slide" data-ride="carousel" id="carousel-1">
            <div class="carousel-inner">
                <div class="carousel-item active"><img class="img-thumbnail w-100 d-block" src="assets/img/aurora4.jpg" alt="Auroras"></div>
                <div class="carousel-item"><img class="img-thumbnail w-100 d-block" src="assets/img/disney.jpg" alt="Disney"></div>
                <div class="carousel-item"><img class="img-thumbnail w-100 d-block" src="assets/img/praga.jpg" alt="Praga"></div>
            </div>
            <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><span class="carousel-control-prev-icon"></span><span class="sr-only">Previous</span></a><a class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><span class="carousel-control-next-icon"></span><span class="sr-only">Next</span></a></div>
            <ol class="carousel-indicators" style="width: 100%; text-align: center; margin-left: 0; padding-top: 2em">
                <li data-target="#carousel-1" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-1" data-slide-to="1"></li>
                <li data-target="#carousel-1" data-slide-to="2"></li>
            </ol>
        </div>
    </div>

    <div class="container" style="margin-top: 100px;">
        <h1>Los paquetes más populares</h1>
    <?php
    if (isset($products, $paquetes)){
        foreach ($products as $product){
            if($product->type == "Paquetes"){
                foreach ($paquetes as $paquete){
                    if($product->id == $paquete->id_product) {
                        if($paquete->type == "Popular"){ ?>

                                <div class="card-group">
                                    <div class="card"><img class="card-img-top w-100 d-block" src="assets/img/Aurora-boreal-300x200.jpg">
                                        <div class="card-body">
                                            <h4 class="card-title" style="color: rgb(34,33,33);"><?php echo $paquete->name ?></h4>
                                            <p class="card-text" style="color: rgb(21,21,21);"><?php echo $paquete->description ?></p>
                                            <p class="card-text" style="color: rgb(21,21,21);">&nbsp; Del 20.01.2021 al 23.01.2021</p>
                                            <p class="text-center bg-info card-text" style="color: rgb(21,21,21);">Por <?php echo $paquete->price ?>€</p>
                                            <form method="get" action="/addCart/<?php echo $product->id ?>">

                                            <input type="number" name="amount" value="1" min="1">
                                            <button class="btn btn-primary border rounded-pill" type="submit" style="margin-left: 32%;">¡Reserva ya!</button>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                                </div>
                                </div>
                        <?php }else if ($paquete->type == "Magicos"){ ?>
                            <div class="container" style="margin-top: 100px;">
                                <h1>paquetes TEMÁTICOS</h1>
                                <div class="card-group">
                                    <div class="card"><img class="card-img-top w-100 d-block" src="assets/img/disney%20300x200.jpg">
                                        <div class="card-body">
                                            <h4 class="card-title" style="color: rgb(34,33,33);">DisneyLand 3 días para 2 Adultos y 2 niños.</h4>
                                            <p class="card-text" style="color: rgb(21,21,21);">De regreso a la magia, que mejor manera de vivir la fantasía, el descubrimiento, el mundo del espectáculo y la aventura en los parques temáticos y&nbsp;los hoteles&nbsp;en Disneyland.<br><br></p>
                                            <p class="text-left card-text" style="color: rgb(21,21,21);">Del 20.01.2021 al 23.01.2021</p>
                                            <p class="text-center bg-info card-text" style="color: rgb(21,21,21);">Por 900€</p><button class="btn btn-primary border rounded-pill" type="button" style="margin-left: 32%;">¡Reserva ya!</button>
                                        </div>
                                    </div>
                                    <div class="card" style="margin-left: 0.5%;"><img class="card-img-top w-100 d-block" src="assets/img/Warner-300x200.jpg">
                                        <div class="card-body">
                                            <h4 class="card-title" style="color: rgb(34,33,33);">Warner 2 días para 2 adultos y 2 niños.</h4>
                                            <p class="card-text" style="color: rgb(21,21,21);">Descubre sus cinco áreas temáticas: Hollywood Boulevard, Movie World Studios, Old West Territory, Cartoon Village y Super Heroes World, con decorados que te transportarán a Estados Unidos y a míticas escenas de cine y de dibujos animados.&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;<br></p>
                                            <p class="card-text" style="color: rgb(21,21,21);">Del 01.02.2021 al 03.02.2021<br></p>
                                            <p class="text-center bg-info card-text" style="color: rgb(21,21,21);">Por 700€</p><button class="btn btn-primary border rounded-pill" type="button" style="margin-left: 32%;">¡Reserva ya!</button>
                                        </div>
                                    </div>
                                    <div class="card" style="margin-left: 0.5%;"><img class="card-img-top w-100 d-block" src="assets/img/siampark.jpg">
                                        <div class="card-body">
                                            <h4 class="card-title" style="color: rgb(34,33,33);">Loro Park y Siam Park 2 DÍAS para 2 adultos y 2 niños.<br></h4>
                                            <p class="card-text" style="color: rgb(21,21,21);">Disfruta de lo mejor de ambos mundos: el terrenal y el<br>acuático. Descarga adrenalina en el reino acuático de Siam Park y haz nuevos<br>amigos en el salvaje Loro Parque. ¡Dos días insuperables!&nbsp; &nbsp; &nbsp;&nbsp;<br></p>
                                            <p class="card-text" style="color: rgb(21,21,21);">Del 10.02.2021 al 12.02.2021<br></p>
                                            <p class="text-center bg-info card-text" style="color: rgb(17,15,15);">Por 300€</p><button class="btn btn-primary border rounded-pill" type="button" style="margin-left: 32%;">¡Reserva ya!</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php }
                    }
                }
            }
        }
    } ?>


    <?php include "com/pieDePagina.php"?>

</body>

</html>
