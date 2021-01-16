<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Lista Transaciones</title>

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
                foreach ($transacion as $transc){


                                    ?>
                                    <tr>
                                        <td><?php echo $transc->id ?></td>
                                        <td><?php echo $transc->order_id ?></td>
                                        <td><?php echo $transc->payerId ?></td>
                                        <td><?php echo $transc->amount ?></td>
                                        <td><?php echo $transc->token ?></td>
                                        <td><?php echo $transc->paymentId ?></td>
                                        <td><?php echo $transc->email ?></td>

                                    </tr>


                <?php }} ?>

            <tbody>
        </table>
    </article>

</section>

<?php include "com/pieDePagina.php"?>

</body>

</html>
