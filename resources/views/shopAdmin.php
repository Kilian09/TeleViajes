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

        </tr>
                    <?php }
                }
                }
                }
        } ?>
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
