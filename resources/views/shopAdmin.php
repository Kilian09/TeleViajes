<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Administración</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body>

<?php include "com/cabecera.php"?>


<aside>
    <article>
        <h1>Información actualizada en tiempo real:</h1>
        <p>Número de Productos en la tienda:
        <p id="products">
            <script>
                setTimeout(numero_productos,1000);
            </script>
        </p>
    </article>
</aside>


<section>
    <header>
        Transacciones
    </header>
    <article>
        Lista de Transacciones
    </article>
</section>
<section>
    <header>
        Productos
    </header>
    <article>
        <h1>Lista de Productos </h1>
        <table>
            <thead>
            <tr>
                <th>Id</th>
                <th>Tipo</th>
                <th>Nombre</th>
                <th>Descripcion</th>
                <th>Subtipo</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
            </thead>
            <tbody>


        <?php
        if (isset($products, $paquetes)){
                foreach ($products as $product){
                if($product->type == "Paquetes"){
                    foreach ($paquetes as $paquete){
                        if($product->id == $paquete->id_product) {
                            ?>

        <tr>
            <td><?php echo $paquete->id_product ?></td>
            <td><?php echo $product->type ?></td>
            <td><?php echo $paquete->name ?></td>
            <td><?php echo $paquete->description ?></td>
            <td><?php echo $paquete->type ?></td>
            <td><?php echo $paquete->price ?></td>
            <td><?php echo $paquete->stock ?></td>

            <form method="get">
                <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
                <td>
                    <button class="basura" type="submit" formaction="shopAdmin/actualizarProducto">
                        <img src="imagenes/editar.png" alt="editar" height="20" width="20">
                    </button>
                </td>
                <td>
                    <button class="basura" type="submit" formaction="shopAdmin/eliminarProducto">
                        <img src="imagenes/basura.png" alt="eliminar" height="20" width="20" >
                    </button>
                </td>
            </form>
        </tr>

                    <?php }}}}} ?>
            <tbody>
        </table>
    </article>
    <article>
        <a href="crearProducto">Crear Productos</a>
    </article>
</section>

<?php include "com/pieDePagina.php"?>

</body>

</html>
