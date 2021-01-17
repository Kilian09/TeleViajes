<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Administración</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body class="fondo">

<?php include "com/cabecera.php"?>

<nav id="vertical">
    <ul>
        <li><a class="active" href="shopAdmin">Productos</a></li>
        <li><a href="listatransaciones">Transacciones</a></li>
        <li><a href="crearProducto">Crear Productos</a></li>

    </ul>
</nav>

<aside id="derecha">
        <p>  Información actualizada en tiempo real:</p>

            <p> Productos:
               <p id="products">
                <script>
                    numero_productos();
                    setTimeout(numero_productos,1000);
                </script>
                </p>
            </p>

        <p>Ventas:
            <p id="numTransc">
            <script>
                get_numTransc();
                setTimeout(getnumTransc,1000);
            </script>
            </p>
        </p>
</aside>

<section class="main">
        <article>

        <h1 class="titulo">Lista de Productos </h1>

            <table id="example"  class="table table-striped  table-bordered" width="100%" bgcolor="#a9a9a9" style="text-align: center">
            <thead>
            <tr>
                <th>Id</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Subtipo</th>
                <th>Precio €</th>
                <th>Stock</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>

        <?php
        if (isset($products)){
                foreach ($products as $product){
                if($product->type == "Paquetes"){
        if (isset($paquetes)){
            foreach ($paquetes as $paquete){
                        if($product->id == $paquete->id_product) {
                            ?>

        <tr>
            <td><?php echo $paquete->id_product ?></td>
            <td><?php echo $product->type ?></td>
            <td><?php echo $paquete->name ?></td>
            <td><?php echo $paquete->description ?></td>
            <td><?php echo $paquete->type ?></td>
            <td><?php echo $paquete->price ?> €</td>
            <td><?php echo $paquete->stock ?></td>
            <td><?php echo $paquete->date ?></td>

            <form method="get">
                <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                <td>
                    <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                        <img src="assets/img/editar.png" alt="editar" height="30" width="30"> Editar
                    </button>
                </td>
                <td>
                    <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                        <img src="assets/img/basura.png" alt="eliminar" height="30" width="30" > Eliminar
                    </button>
                </td>
            </form>
        </tr>

                <?php }}}}?>

                    <?php if($product->type == "Cruceros"){
                    if (isset($cruises)){
                    foreach ($cruises as $cruise){
                        if($product->id == $cruise->id_product) {   ?>
                    <tr>
                        <td><?php echo $cruise->id_product ?></td>
                        <td><?php echo $product->type ?></td>
                        <td><?php echo $cruise->name ?></td>
                        <td><?php echo $cruise->description ?></td>
                        <td><?php echo $cruise->type ?></td>
                        <td><?php echo $cruise->price ?> €</td>
                        <td><?php echo $cruise->stock ?></td>
                        <td><?php echo $cruise->date ?></td>

                        <form method="get">
                            <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                            <td>
                                <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                                    <img src="assets/img/editar.png" alt="editar" height="30" width="30"> Editar
                                </button>
                            </td>
                            <td>
                                <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                                    <img src="assets/img/basura.png" alt="eliminar" height="30" width="30" > Eliminar
                                </button>
                            </td>
                        </form>
                    </tr>
            <?php }}}} ?>

                    <?php if($product->type == "Actividades"){
                        if (isset($activities)){
                            foreach ($activities as $activity){
                                if($product->id == $activity->id_product) {   ?>
                                    <tr>
                                        <td><?php echo $activity->id_product ?></td>
                                        <td><?php echo $product->type ?></td>
                                        <td><?php echo $activity->name ?></td>
                                        <td><?php echo $activity->description ?></td>
                                        <td><?php echo $activity->type ?></td>
                                        <td><?php echo $activity->price ?> €</td>
                                        <td><?php echo $activity->stock ?></td>
                                        <td><?php echo $activity->date ?></td>

                                        <form method="get">
                                            <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                                                    <img src="assets/img/editar.png" alt="editar" height="30" width="30"> Editar
                                                </button>
                                            </td>
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                                                    <img src="assets/img/basura.png" alt="eliminar" height="30" width="30" > Eliminar
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php }}}} ?>


                    <?php if($product->type == "Escolares"){
                        if (isset($escolares)){
                            foreach ($escolares as $escolar){
                                if($product->id == $escolar->id_product) {   ?>
                                    <tr>
                                        <td><?php echo $escolar->id_product ?></td>
                                        <td><?php echo $product->type ?></td>
                                        <td><?php echo $escolar->name ?></td>
                                        <td><?php echo $escolar->description ?></td>
                                        <td><?php echo $escolar->type ?></td>
                                        <td><?php echo $escolar->price ?> €</td>
                                        <td><?php echo $escolar->stock ?></td>
                                        <td><?php echo $escolar->date ?></td>

                                        <form method="get">
                                            <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                                                    <img src="assets/img/editar.png" alt="editar" height="30" width="30"> Editar
                                                </button>
                                            </td>
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                                                    <img src="assets/img/basura.png" alt="eliminar" height="30" width="30" > Eliminar
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php }}}} ?>

                    <?php if($product->type == "Universitarios"){
                        if (isset($universitarios)){
                            foreach ($universitarios as $universitario){
                                if($product->id == $universitario->id_product) {   ?>
                                    <tr>
                                        <td><?php echo $universitario->id_product ?></td>
                                        <td><?php echo $product->type ?></td>
                                        <td><?php echo $universitario->name ?></td>
                                        <td><?php echo $universitario->description ?></td>
                                        <td><?php echo $universitario->type ?></td>
                                        <td><?php echo $universitario->price ?> €</td>
                                        <td><?php echo $universitario->stock ?></td>
                                        <td><?php echo $universitario->date ?></td>

                                        <form method="get">
                                            <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                                                    <img src="assets/img/editar.png" alt="editar" height="30" width="30"> Editar
                                                </button>
                                            </td>
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                                                    <img src="assets/img/basura.png" alt="eliminar" height="30" width="30" > Eliminar
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php }}}} ?>

                    <?php if($product->type == "Vuelos"){
                        if (isset($vuelos)){
                            foreach ($vuelos as $vuelo){
                                if($product->id == $vuelo->id_product) {   ?>
                                    <tr>
                                        <td><?php echo $vuelo->id_product ?></td>
                                        <td><?php echo $product->type ?></td>
                                        <td><?php echo $vuelo->name ?></td>
                                        <td><?php echo $vuelo->description ?></td>
                                        <td><?php echo $vuelo->type ?></td>
                                        <td><?php echo $vuelo->price ?> €</td>
                                        <td><?php echo $vuelo->stock ?></td>
                                        <td><?php echo $vuelo->date ?></td>

                                        <form method="get">
                                            <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                                                    <img src="assets/img/editar.png" alt="editar" height="30" width="30"> Editar
                                                </button>
                                            </td>
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                                                    <img src="assets/img/basura.png" alt="eliminar" height="30" width="30" > Eliminar
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php }}}} ?>

                    <?php if($product->type == "Ancianos"){
                        if (isset($ancianos)){
                            foreach ($ancianos as $anciano){
                                if($product->id == $anciano->id_product) {   ?>
                                    <tr>
                                        <td><?php echo $anciano->id_product ?></td>
                                        <td><?php echo $product->type ?></td>
                                        <td><?php echo $anciano->name ?></td>
                                        <td><?php echo $anciano->description ?></td>
                                        <td><?php echo $anciano->type ?></td>
                                        <td><?php echo $anciano->price ?> €</td>
                                        <td><?php echo $anciano->stock ?></td>
                                        <td><?php echo $anciano->date ?></td>

                                        <form method="get">
                                            <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                                                    <img src="assets/img/editar.png" alt="editar" height="30" width="30"> Editar
                                                </button>
                                            </td>
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                                                    <img src="assets/img/basura.png" alt="eliminar" height="30" width="30" > Eliminar
                                                </button>
                                            </td>
                                        </form>
                                    </tr>
                                <?php }}}} ?>

                    <?php if($product->type == "Familias"){
                        if (isset($familias)){
                            foreach ($familias as $familia){
                                if($product->id == $familia->id_product) {   ?>
                                    <tr>
                                        <td><?php echo $familia->id_product ?></td>
                                        <td><?php echo $product->type ?></td>
                                        <td><?php echo $familia->name ?></td>
                                        <td><?php echo $familia->description ?></td>
                                        <td><?php echo $familia->type ?></td>
                                        <td><?php echo $familia->price ?> €</td>
                                        <td><?php echo $familia->stock ?></td>
                                        <td><?php echo $familia->date ?></td>

                                        <form method="get">
                                            <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                                                    <img src="assets/img/editar.png" alt="editar" height="30" width="30"> Editar
                                                </button>
                                            </td>
                                            <td>
                                                <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                                                    <img src="assets/img/basura.png" alt="eliminar" height="30" width="30" > Eliminar
                                                </button>
                                            </td>
                                        </form>
                                    </tr>

                                <?php }}}} ?>

                <?php }} ?>

            <tbody>
        </table>

    </article>
</section>

<?php include "com/pieDePagina.php"?>

</body>

</html>
