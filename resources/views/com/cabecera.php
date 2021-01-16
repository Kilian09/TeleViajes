<nav class="navbar navbar-dark navbar-expand-md text-white bg-dark navigation-clean-button" style="width: 100%;height: 18%;">
    <div class="container"><button data-toggle="collapse" class="navbar-toggler" data-target="#navcol-1"><span class="sr-only">Toggle navigation</span><span class="navbar-toggler-icon"></span>
        </button><a class="navbar-brand" href="/"><img src="assets/img/logo%20(1).png" style="height: 75px;background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);width: 200px;"></a><a class="navbar-brand" href="#"></a>
        <div class="collapse navbar-collapse" id="navcol-1" style="color: #f2f5f8;">
            <ul class="nav navbar-nav mr-auto">
                <li class="nav-item"></li>
                <li class="nav-item"><a class="nav-link" href="cruceros" style="color: var(--light);">Cruceros</a></li>
                <li class="nav-item"><a class="nav-link" href="paquetes" style="color: var(--light);">Paquetes</a></li>
                <li class="nav-item"><a class="nav-link" href="actividades" style="color: var(--light);">Actividades</a></li>
                <li class="nav-item dropdown"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="grupos" style="color: var(--light);">Grupos&nbsp;</a>
                    <div class="dropdown-menu"><a class="dropdown-item" href="escolares">Escolares</a>
                        <a class="dropdown-item" href="universitarios">Universitari@s</a>
                        <a class="dropdown-item" href="ancianos">Ancianos</a>
                        <a class="dropdown-item" href="familia">Familia</a></div>
                </li>
                <li class="nav-item"><a class="nav-link" href="contacto" style="color: var(--light);">Contactos</a></li>
            </ul>


                <span class="d-inline navbar-text actions">
                    <article class="container">
        <div class="dropdown-container">
                <button class="btn btn-primary dropdown-toggle btn-sm ml-1" data-toggle="dropdown" type="button" aria-expanded="true">
                <span class="badge badge-pill badge-light">5</span>
                <i class="fa fa-shopping-cart mx-2"></i>Total<span class="caret"></span>
            </button>
                <ul role="menu" class="dropdown-menu" style="left:auto;">
                <li class="p-2 text-nowrap text-right">
                    <span class="badge badge-pill badge-warning align-text-top mr-1 mt-1"></span>
   <a href="#" class="badge badge-danger text-white">-</a></li>
            </ul>
        </div>

    </article>


                    <?php
                    if(session()->has("user") == true){
                    ?>

                <a class="btn btn-light d-inline action-button" id="rojo" role="button" href="usuario"><?php echo strtoupper(session("username")) ?></a>

                <a class="btn btn-light d-inline action-button" id="rojo" role="button" href="cerrar_session">Cerrar Sesión</a>
            <?php
            if(session("username") == "admin" ){?>
                <a class="btn btn-light d-inline action-button" role="button" href="shopAdmin"><e class="fa fa-cog"> </a>
            <?php } ?>
                </span>

            <?php }else{  ?>
                <span class="d-inline navbar-text actions"> <a class="d-inline login" href="login" >Iniciar Sesión</a>
                <a class="btn btn-light d-inline action-button" role="button" href="register">Registrarse</a>
                </span>
            <?php } ?>
        </div>
    </div>
</nav>


