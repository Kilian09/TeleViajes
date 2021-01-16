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

<?php include "com/cabecera.php"?>

<?php


    $userid = session('user');
        if(isset($userid)) {
            $ordenes = DB::table('orders')
                ->join('users','orders.user_id', '=', 'users.id')
                ->select('orders.*', 'users.nombre')
                ->paginate(3);
}

foreach ($ordenes->items() as $orden) {

    echo '<p><strong>Nombre Usuario: </strong>' . $userid . '</p>';
    echo '<p><strong>Total de la compra: </strong>' . $orden->total . '</p>';
    echo '<p><strong>Estado: </strong>' . $orden->state . '</p>';
}

?>

</body>
<?php include "com/pieDePagina.php"?>

</html>
