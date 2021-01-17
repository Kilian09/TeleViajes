<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Contactos</title>

    <?php include "com/estilos.php" ?>
    <?php include "com/scripts.php" ?>

</head>

<body>

<?php include "com/cabecera.php" ?>

<div class="bg-secondary">
    <div class="container-fluid text-light bg-dark">
        <h1 class="text-capitalize bg-dark shadow"
            style="text-align: center;margin-bottom: 0;padding-top: 20px; display: block">Información de contacto</h1>
        <hr>
        <form id="contactForm" action="procesar_contacto" method="post">
            <?= csrf_field() ?>
            <div class="form-row">
                <div class="col-12 col-md-6" id="message" style="border-color: var(--blue);">
                    <h2 class="h4"><i class="fa fa-envelope"></i> Contáctenos</h2>
                    <div class="form-group"><label for="from-name">Nombre</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="text-body input-group-text"><i
                                        class="fa fa-user-o"></i></span></div>
                            <input class="form-control" type="text" id="from-name" name="nombre" required=""
                                   placeholder="Nombre completo">
                        </div>
                    </div>
                    <div class="form-group"><label for="from-email">Email</label>
                        <div class="input-group">
                            <div class="input-group-prepend"><span class="input-group-text"><i
                                        class="fa fa-envelope-o"></i></span></div>
                            <input class="form-control" type="text" id="from-email" name="email" required=""
                                   placeholder="Dirección email">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="col-12 col-sm-6 col-md-12 col-lg-6">
                            <div class="form-group"><label for="from-phone">Móvil</label>
                                <div class="input-group">
                                    <div class="input-group-prepend"><span class="input-group-text"><i
                                                class="fa fa-phone"></i></span></div>
                                    <input class="form-control" type="text" id="from-phone" name="telefono" required=""
                                           placeholder="Nº Telefono">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group"><label for="from-comments">Comentario</label>
                        <textarea class="form-control" id="from-comments" name="comentario" placeholder="Enter Comments"
                                  rows="5"></textarea>
                    </div>

                    <div class="form-group">
                        <div class="form-row">
                            <div class="col">
                                <button class="btn btn-primary btn-block" type="reset"
                                        style="background: rgb(3,47,112);"><i class="fa fa-undo"></i>&nbsp;limpiar
                                </button>
                            </div>
                            <div class="col">
                                <button class="btn btn-primary btn-block" type="submit" style="background: #002b7f;">
                                    Enviar&nbsp;<i class="fa fa-chevron-circle-right"></i></button>
                            </div>
                        </div>
                    </div>
                    <hr class="d-flex d-md-none">
                </div>

                <div class="col-12 col-md-6">
                    <h2 class="h4"><i class="fa fa-location-arrow"></i> Localización</h2>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="static-map">
                                <iframe allowfullscreen="" frameborder="0"
                                        src="https://www.google.com/maps/embed/v1/search?key=AIzaSyCLGmO09UHo8NQHdplzSQ6E2LpHE0IWaaI&amp;q=Eite+ulpgc&amp;zoom=16"
                                        width="100%" height="400"></iframe>
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <h2 class="h4"><i class="fa fa-user"></i> Nuestra página</h2>
                            <div><span>televiajes.test</span></div>
                            <hr class="d-sm-none d-md-block d-lg-none">
                        </div>
                        <div class="col-sm-6 col-md-12 col-lg-6">
                            <h2 class="h4"><i class="fa fa-location-arrow"></i>Nuestra dirección</h2>
                            <div><span><strong>EITE-ULPGC</strong></span></div>
                            <div><span>Aulario, 35017 Tafira Baja, Las Palmas</span></div>
                            <hr class="d-sm-none">
                        </div>
                    </div>
                </div>

            </div>
        </form>
    </div>

    <?php include "com/pieDePagina.php" ?>

</body>

</html>
