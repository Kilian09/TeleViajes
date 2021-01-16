<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Cruceros</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>
<body>

<?php include "com/cabecera.php"?>

    <section>
        <div id="w_shop_105" class="carousel slide w_shop_105_indicators w_shop_105_control_button thumb_scroll_x swipe_x ps_easeOutInCubic" data-ride="carousel" data-pause="hover" data-interval="8000" data-duration="2000">
            <div class="w_shop_105_main_header">
                <h1 style="display: inline"><span>Cruceros Destacados</span></h1>
            </div>
                <?php
                if (isset($products, $cruises)){
                    foreach ($products as $product){
                        if($product->type == "Cruceros"){
                            foreach ($cruises as $cruise){
                                if($product->id == $cruise->id_product) {
                                    ?>

            <div class="carousel-inner" role="listbox" style="margin-top: 2em">
                <div class="carousel-item active"><img src="assets/img/medi.jpg" alt="w_shop_105_01" height="350" width="500">
                    <div class="w_shop_105_left_box"><span data-animation="animated fadeInLeft" style="font-family: roboto;"> <?php echo $cruise->price ?>€ <br></span>
                        <h1 class="left-h" data-animation="animated fadeInLeft"><?php echo $cruise->name ?></h1>
                        <p data-animation="animated fadeInLeft"> <?php echo $cruise->description ?>.</p><a href="#" data-animation="animated fadeInLeft">Comprar</a>
                    </div>
                    <div class="w_shop_105_right_box" data-animation="animated fadeInRight">
                        <ul>
                            <li data-animation="animated fadeInRight">Fechas: <?php echo $cruise->date ?></li>
                            <li data-animation="animated fadeInRight">Precio: <?php echo $cruise->price ?>€ por persona</li>
                            <li data-animation="animated fadeInRight">Disponibilidad: <?php echo $cruise->stock?> plazas</li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php }}}}} ?>

        </div>
    </section>

    <?php include "com/pieDePagina.php"?>

</body>

</html>

