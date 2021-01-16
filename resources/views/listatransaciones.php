<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Administración</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body>

<?php include "com/cabecera.php"?>




<aside id="lateralShop">
    <article>
        <h5>  Información actualizada en tiempo real:</h5>

        <header>
            Ventas:
            <script>
                get_numTransc();
                setTimeout(getnumTransc,1000);
            </script>
            <p id="numTransc">
        </header>

        </p>
    </article>
</aside>


<section>
    <article>
        <h1>Lista de Transaciones </h1>
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
