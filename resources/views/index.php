<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inicio</title>

    <?php include "com/estilos.php" ?>
    <?php include "com/scripts.php" ?>

</head>

<body id="page-top">

<?php include "com/cabecera.php" ?>

<header class="masthead" style="background: url(&quot;assets/img/ini.jpg&quot;) left / auto repeat;">
    <div id="inicio" class="intro-body">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto">
                    <h1 class="brand-heading" style="display: block">TELEVIAJES</h1>
                    <p class="intro-text">En esta época todo tiene que tener tele delante</p><a
                        class="btn btn-link btn-circle" role="button" href="#carousel"><i
                            class="fa fa-angle-double-down animated"></i></a>
                </div>
            </div>
        </div>
    </div>
</header>
<div class="features-boxed">
    <div class="container">
        <div class="intro">
            <h2 class="text-center">ORGANIZA TU VIAJE</h2>
            <p class="text-center">Agencia de Viajes Online. Las mejores ofertas de viajes: vuelos low-cost,
                actividades, cruceros, paquetes baratos... Reserva Vacaciones y Viajes en TeleViajes.</p>
        </div>
        <div class="row justify-content-center features">

            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-leaf icon"></i>
                    <h3 class="name">Naturaleza </h3>
                    <p>En nuestra oferta destacan nuestras actividades en la naturaleza y los destinos idílicos.</p><a
                        class="learn-more" href="actividades">Ver Actividades »</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-clock-o icon"></i>
                    <h3 class="name">Durante todo el año</h3>
                    <p>Desde Enero hasta Diciembre, desde la playa hasta la nieve, de Canarias al mundo.</p><a
                        class="learn-more" href="#carousel">Ver Oferta »</a>
                </div>
            </div>

            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-plane icon"></i>
                    <h3 class="name">Velocidad</h3>
                    <p>Los viajes más baratos con las menores y más rápidas conexiones posibles.</p><a
                        class="learn-more" href="#novedadesIndex">Ver Oferta »</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-map-marker icon"></i>
                    <h3 class="name">A cualquier lugar</h3>
                    <p>En caso de que nuestras ofertas no se ajusten a tus gustos, buscaremos tu destino ideal.</p><a
                        class="learn-more" href="contacto">Contáctenos »</a>
                </div>
            </div>
            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-list-alt icon"></i>
                    <h3 class="name">Máxima Flexibilidad </h3>
                    <p>En caso de que nuestras ofertas no se ajusten a su calendario, buscaremos una solución.</p><a
                        class="learn-more" href="contacto">Contáctenos »</a>
                </div>
            </div>

            <div class="col-sm-6 col-md-5 col-lg-4 item">
                <div class="box"><i class="fa fa-phone icon"></i>
                    <h3 class="name">24/7</h3>
                    <p>Nuestro equipo estará pendiente de usted en caso de cualquier incidencia.</p><a
                        class="learn-more" href="contacto">Contáctenos »</a>
                </div>
            </div>
        </div>
    </div>
</div>

<div data-bs-parallax-bg="true"
     style="height:500px;background-image:url(&quot;assets/img/para.jpg&quot;);background-position:center;background-size:cover;"></div>

<div class="article-list" id="novedadesIndex">
    <div class="container">
        <div class="intro">
            <h2 class="text-center" style="font-size: 30px;text-align: center;color: var(--danger);">Vuelos
                Calientes</h2>
            <p class="text-center">Recopilatorio de los vuelos más económicos actualmente.</p>
        </div>
        <div class="row articles">

            <?php
            if (isset($products, $vuelos)) {
                foreach ($products as $product) {
                    if ($product->type == "Vuelos") {
                        foreach ($vuelos as $vuelo) {
                            if ($product->id == $vuelo->id_product) {
                                ?>
                                <div class="col-sm-6 col-md-4 item"><img class="img-fluid"
                                                                                     src="assets/img/<?php echo $vuelo->name ?>.jpg" alt="<?php echo $vuelo->name ?>">
                                    <h3 class="name"><?php echo $vuelo->name ?></h3>
                                    <p class="description"> <?php echo $vuelo->description ?>.
                                        Del <?php echo $vuelo->date ?>.<br> Desde <?php echo $vuelo->price ?>€.
                                        Quedan <?php echo $vuelo->stock ?> plazas. </p>

                                    <form method="get" action="/addCart/<?php echo $product->id ?>">
                                        <input type="number" name="amount" min="1" value="1">
                                        <button type="submit" class="fas fa-shopping-cart"
                                                style="color: var(--danger);"></button>
                                    </form>

                                </div>

                            <?php }
                        }
                    }
                }
            } ?>

        </div>
    </div>
</div>

<section id="carousel">
    <div class="carousel slide" data-ride="carousel" id="carousel-1">
        <div class="carousel-inner">
            <div class="carousel-item">
                <div class="jumbotron pulse animated hero-nature carousel-hero"
                     style="background: url(&quot;assets/img/buceo1.jpg&quot;) ;background-size: 1400px;">
                    <h1 class="hero-title" style="display: block">Actividades</h1>
                    <p class="hero-subtitle" style="font-size: 20px;">Actividades de todo tipo y para todos.</p>
                    <p><a class="btn btn-primary hero-button plat" role="button" href="actividades">Ver actividades</a>
                    </p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="jumbotron pulse animated hero-photography carousel-hero"
                     style="background: url(&quot;assets/img/aurora4.jpg&quot;) center / cover;">
                    <h1 class="hero-title" style="display: block">Paquetes</h1>
                    <p class="hero-subtitle" style="font-size: 20px;">Gran cantidad de viajes con temáticas variadas
                        para todos los gustos y todas las edades.</p>
                    <p><a class="btn btn-primary hero-button plat" role="button" href="paquetes">ver paquetes</a></p>
                </div>
            </div>
            <div class="carousel-item active">
                <div class="jumbotron pulse animated hero-technology carousel-hero" id="carousel"
                     style="background: url(&quot;assets/img/Crucero Noruega.jpg&quot;) center / auto;">
                    <h1 class="hero-title" style="display: block">Cruceros</h1>
                    <p class="hero-subtitle" style="font-size: 20px;color: var(--dark);">Cruceros por todo el mundo con
                        las compañías más prestigiosas.</p>
                    <p><a class="btn btn-primary hero-button plat" role="button" href="cruceros">Ver cruceros</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <div class="jumbotron pulse animated hero-technology carousel-hero"
                     style="background: url(&quot;assets/img/grupo.jpg&quot;) center;">
                    <h1 class="hero-title" style="display: block">Grupos</h1>
                    <p class="hero-subtitle">Viajes organizados especializados para cada tipo de grupo.&nbsp;</p>
                    <p><a class="btn btn-primary hero-button plat" role="button" href="universitarios">Ver grupos</a>
                    </p>
                </div>
            </div>
        </div>
        <div><a class="carousel-control-prev" href="#carousel-1" role="button" data-slide="prev"><i
                    class="fa fa-chevron-left"></i><span class="sr-only">Previous</span></a><a
                class="carousel-control-next" href="#carousel-1" role="button" data-slide="next"><i
                    class="fa fa-chevron-right"></i><span class="sr-only">Next</span></a></div>
        <ol class="carousel-indicators" style="width: 100%; text-align: center; margin-left: 0;">
            <li data-target="#carousel-1" data-slide-to="0"></li>
            <li data-target="#carousel-1" data-slide-to="1"></li>
            <li data-target="#carousel-1" data-slide-to="2" class="active"></li>
            <li data-target="#carousel-1" data-slide-to="3"></li>
        </ol>
    </div>
</section>


<?php include "com/pieDePagina.php" ?>

</body>

</html>
