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
        <h1 class="titulo">Lista de Transacciones </h1>

        <table id="example"  class="table table-striped  table-bordered" width="100%" bgcolor="#a9a9a9">
            <thead>
            <tr>
                <th>Id</th>
                <th>order_id</th>
                <th>payerId</th>
                <th>amount</th>
                <th>token</th>
                <th>paymentId</th>
                <th>email</th>
            </tr>
            </thead>
            <tbody>

            <?php
            if (isset($transacion)){
                foreach ($transacion as $ord_id){


                                    ?>
                                    <tr>
                                        <td><?php echo $transacion->id ?></td>
                                        <td><?php echo $transacion->order_id ?></td>
                                        <td><?php echo $transacion->payerId ?></td>
                                        <td><?php echo $transacion->amount ?></td>
                                        <td><?php echo $transacion->token ?></td>
                                        <td><?php echo $transacion->paymentId ?></td>
                                        <td><?php echo $transacion->email ?></td>

                <?php }} ?>

            <tbody>
        </table>

    </article>
</section>


<?php include "com/pieDePagina.php"?>

</body>

</html>
