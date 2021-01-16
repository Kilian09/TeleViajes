
<?php
session_start();

if (session()->has('product_id') == true) {
    if (session()->has('amount') == true) {

        //Añadir producto al carrito
        if (session('PROD_' . session('product_id')) != null) {
            $cantidad = session('PROD_' . session('product_id')) + session('amount');
            session(['PROD_' . session('product_id') => $cantidad]);

            session()->forget(['product_id','amount']);


        } else
            session(['PROD_' . session('product_id') => session('amount')]);

        session()->forget(['product_id','amount']);

    }

}
?>
<nav class="navbar navbar-dark navbar-expand-md text-white bg-dark navigation-clean-button" style="width: 100%;height: 18%;">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="assets/img/logo%20(1).png" style="height: 75px;background: url(&quot;https://cdn.bootstrapstudio.io/placeholders/1400x800.png&quot;);width: 200px;"></a>

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
                <li class="nav-item"><a class="nav-link" href="contacto" style="color: var(--light);">Contacto</a></li>
            </ul>

                <span class="d-inline navbar-text actions">

                    <?php if(session()->has("user") == true){ ?>

                <a class="btn btn-light d-inline action-button" id="rojo" role="button" href="usuario" ><?php echo strtoupper(session("username")) ?></a>
                <a class="btn btn-light d-inline action-button" id="rojo" role="button" href="cerrar_session">Cerrar Sesión</a>

            <?php if(session("username") == "admin" ){ ?>
                <a class="btn btn-light d-inline action-button" role="button" href="shopAdmin"><e class="fa fa-cog"> </a>
            <?php } ?>

            <?php }else{  ?>
                    <a class="btn btn-light d-inline action-button" role="button" href="login" >Iniciar Sesión</a>
                    <a class="btn btn-light d-inline action-button" role="button" href="register">Registrarse</a>
            <?php } ?>

            <article class="container" style="margin-top: 1em; text-align: center">
                <div class="dropdown-container">
                    <button class="btn btn-primary dropdown-toggle btn-sm ml-1" data-toggle="dropdown" type="button" aria-expanded="true">
                        <span class="badge badge-pill badge-light"><?php echo session('cantidadTotal') ?></span>
                        <i class="fa fa-shopping-cart mx-2"></i><?php echo session('total') ?><span class="caret"></span>
                    </button>
                       <?php if(session('carrito') == null){
                       //Crear  carrito
                       session(['carrito' => 'OK']);

                       ?>
                    <ul role="menu" class="dropdown-menu" style="left:auto;">
                        <li class="p-2 text-nowrap text-right">
                            <span class="badge badge-pill badge-warning align-text-top mr-1 mt-1"></span>
                            <a href="#" class="badge badge-danger text-white">-</a></li>
                         <?php echo "El carrito está vacío";  ?>
                    </ul>

                       <?php } else if(session('carrito')!=null && count(session()->all()) > 3){
                       $data = session()->all();
                       print_r($data);

                       ?>

  <ul role="menu" class="dropdown-menu" style="left:auto;">

                <?php foreach ($data as $key => $valor) {
                if(substr($key,0,5) == 'PROD_') {
                $prodID = substr($key,5);
                $producto = \App\Products::where('id',$prodID)->get();
                $paquete = \App\Paquetes::where('id_product',$prodID)->get();
                $cruceros = \App\Cruceros::where('id_product',$prodID)->get();
                ?>
                               <table>
                                <tbody>
                        <li class="p-2 text-nowrap text-right">
                               <tr>
                    <span class="badge badge-pill badge-warning align-text-top mr-1 mt-1"><?php echo $valor ?></span>

                    <?php
                    if($producto[0]['type'] == "Paquetes") {
                    echo $paquete[0]['name'];
                    ?>
                            </tr>
                              <tr>
                                <?php
                                }else if($producto[0]['type'] == "Cruceros"){
                                    echo $cruceros[0]['name'];
                                }
                                ?>
                                   </tr>

                    <a href="#" class="badge badge-danger text-white">-</a></li>

                        <?php
                        }
                        }
                        ?>
<tfoot>

                                   <tr> <th><hr><form method='get' action='vaciarCarrito'>
                    <input type='submit' name='Vaciar' value='Vaciar Carrito'>
                   </form>
                          </th>
                    <th><hr><form method='get' action='eliminarProductoCarrito'>
                    <input type='submit' name='Vaciar' value='Checkout Paypal'>
                   </form>
                                       </th>
                                   </tr>
                <?php

                }
                ?>
 </tfoot>
                </table>
                    </ul>

                </div>
            </article>

                </span>

        </div>
    </div>
</nav>


