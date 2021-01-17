<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Usuario</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body style="background: url(&quot;assets/img/intro-bg.jpg&quot;), #c9c9c9;">

<?php include "com/cabecera.php"?>

<section class="main">

    <article>

    <p style="text-align: center">Bienvenido <?php echo  strtoupper(session('username')) ?>, aquí puede encontrar toda la información sobre sus compras: </p>

         <?php
if (isset($orders)){
    foreach ($orders as $order){
        if($order->user_id == session('user')){ ?>

   <p>Numero de referencia de de la compra: <?php echo $order->id ?> </p>


        <table id="example"  class="table table-striped  table-bordered" width="100%" bgcolor="#a9a9a9" style="text-align: center">
            <thead>
            <tr>

                <th>Total de la compra (€)</th>
                <th>Estado</th>
                <th>Fecha</th>

            </tr>
            </thead>
            <tbody>
            <tr>
                <td><?php echo $order->total ?></td>
                <td><?php echo $order->state ?></td>
                <td><?php echo $order->created_at ?></td>

            </tr>
            <tbody>
        </table>

    </article>
        <?php }}} ?>







</section>

</body>

<?php include "com/pieDePagina.php"?>

</html>
