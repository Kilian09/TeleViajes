<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>TELEVIAJES 2</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body style="background: url(&quot;assets/img/intro-bg.jpg&quot;), #c9c9c9;">
<section>

<?php include "com/cabecera.php"?>


    <h4>Bienvenido aquí puede encontrar toda la informacion sobre todas sus compras</h4>


<?php


    $userid = session('user');
        if(isset($userid)) {
            $ordenes = DB::table('orders')
                ->join('users','orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.nombre')
                ->paginate(3);
}

foreach ($ordenes->items() as $orden) {
    echo '<article class="Usuario">';
    echo '<div >';

    echo '<p><strong>Nombre Usuario: </strong>' . strtoupper(session("username")). '</p>';
    echo '<p><strong>Descripcion del producto: </strong> </p>';
    echo '<p><strong>Paquete: </strong></p>';


    echo '</div>';
    echo '</article>';
    ?>
    <table id="example"  class="table table-striped  table-bordered" width="100%" bgcolor="#a9a9a9">
        <thead>
        <tr>

            <th>Total de la compra</th>
            <th>Estado</th>
            <th>date</th>

        </tr>
        </thead>
        <tbody>
<tr>
    <td><?php echo  $orden->total ?></td>
<td><?php echo $orden->state ?></td>
<td><?php echo $orden->created_at ?></td>

</tr>
        <tbody>
    </table>
    <?php

}

?>
</section>
</body>
<?php include "com/pieDePagina.php"?>

</html>
