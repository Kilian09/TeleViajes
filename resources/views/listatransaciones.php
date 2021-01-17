<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Administración</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body class="fondo">

<?php include "com/cabecera.php"; ?>

<nav id="vertical">
    <ul>
        <li><a href="shopAdmin">Productos</a></li>
        <li><a href="listatransaciones" class="active">Transacciones</a></li>
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
        <h1 class="titulo">Listado de Transacciones </h1>

        <table id="example"  class="table table-striped  table-bordered" width="100%" bgcolor="#a9a9a9" style="text-align: center">
            <thead>
            <tr>
                <th>Id Transacciónn</th>
                <th>Id Orden</th>
                <th>Id Cliente</th>
                <th>Email</th>
                <th>Id Pago</th>
                <th>Cantidad</th>
                <th>Token</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (isset($transacciones)){
                foreach ($transacciones as $transaccion){ ?>
                                    <tr>
                                        <td><?php echo $transaccion->id ?></td>
                                        <td><?php echo $transaccion->order_id ?></td>
                                        <td><?php echo $transaccion->payerId ?></td>
                                        <td><?php echo $transaccion->email ?></td>
                                        <td><?php echo $transaccion->paymentId ?></td>
                                        <td><?php echo $transaccion->amount ?></td>
                                        <td><?php echo $transaccion->token ?></td>
                                        <td><?php echo $transaccion->created_at ?></td>
                <?php }} ?>

            <tbody>
        </table>
    </article>

    <article style="margin-top: 5em">
        <h1 class="titulo">Listado de Órdenes </h1>

        <table id="example"  class="table table-striped  table-bordered" width="100%" bgcolor="#a9a9a9" style="text-align: center">
            <thead>
            <tr>
                <th>Id Orden</th>
                <th>Usuario</th>
                <th>Estado Orden</th>
                <th>Total</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (isset($orders)){
            foreach ($orders as $order){ ?>
            <tr>
                <td><?php echo $order->id ?></td>
                <td><?php echo $order->user_id ?></td>
                <td><?php echo $order->state ?></td>
                <td><?php echo $order->total ?></td>
                <td><?php echo $order->created_at ?></td>

                <?php }} ?>

            <tbody>
        </table>
    </article>

    <article style="margin-top: 5em">
        <h1 class="titulo">Inventario de Ventas </h1>

        <table id="example"  class="table table-striped  table-bordered" width="100%" bgcolor="#a9a9a9" style="text-align: center">
            <thead>
            <tr>
                <th>Id Orden</th>
                <th>Producto</th>
                <th>Cantidad</th>
                <th>Fecha</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (isset($ordersDet)){
            foreach ($ordersDet as $orderDet){ ?>
            <tr>
                <td><?php echo $orderDet->order_id ?></td>
                <td><?php echo $orderDet->product_id ?></td>
                <td><?php echo $orderDet->amount ?></td>
                <td><?php echo $orderDet->created_at ?></td>

                <?php }} ?>

            <tbody>
        </table>
    </article>


</section>


<?php include "com/pieDePagina.php"?>

</body>

</html>
