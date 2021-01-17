<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Administración</title>

    <?php include "com/estilos.php" ?>
    <?php include "com/scripts.php" ?>

</head>

<body class="fondo">

<?php include "com/cabecera.php"; ?>

<nav id="vertical">
    <ul>
        <li><a  href="shopAdmin">Productos</a></li>
        <li><a href="listatransaciones" >Transacciones</a></li>
        <li><a href="listaOrdenes">Órdenes</a></li>
        <li><a href="ListaInventario" class="active">Inventario de Ventas</a></li>
        <li><a href="crearProducto">Crear Productos</a></li>
    </ul>
</nav>

<aside id="derecha">
    <p> Información actualizada en tiempo real:</p>

    <p> Productos:
    <p id="products">
        <script>
            numero_productos();
            setTimeout(numero_productos, 1000);
        </script>
    </p>
    </p>

    <p>Ventas:
    <p id="numTransc">
        <script>
            get_numTransc();
            setTimeout(getnumTransc, 1000);
        </script>
    </p>
    </p>
</aside>

<section class="main">
    <article style="margin-top: 5em">
        <h1 class="titulo">Inventario de Ventas </h1>

        <table id="example" class="table table-striped  table-bordered" width="100%" bgcolor="#a9a9a9"
               style="text-align: center">
            <thead>
            <tr>
                <th>Id Orden</th>
                <th>Id del Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (isset($ordersDet)){
            foreach ($ordersDet

            as $orderDet){ ?>
            <tr>
                <td><?php echo $orderDet->order_id ?></td>
                <td><?php echo $orderDet->product_id ?></td>
                <td><?php echo $orderDet->amount ?></td>
                <td><?php echo $orderDet->created_at ?></td>

                <?php }
                } ?>

            <tbody>
        </table>
    </article>


</section>


<?php include "com/pieDePagina.php" ?>

</body>

</html>
