<?php
if(session('username') == "admin"){
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Crear Producto</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>
<body>

<?php include "com/cabecera.php"; ?>

    <form method="post" name="crearProductform" action="addProducto">
        <?= csrf_field() ?>
        <table>
            <tbody>
            <tr>
                <p>
                <th><label>Nombre del producto:</label></th>
                <th><input type="text" name="name"  class="inputText"> </th>
                </p>
            </tr>
            <tr>
                <p>
                <th><label>Descripción:</label></th>
                <th><input type="text" name="description"  class="inputText"></th>
                </p>
            </tr>
            <tr>
                <th><label>Precio del Producto en €: </label></th>
                <th><input type="number" name="price" class="inputText"></th>
            </tr>
            <tr>
                <th><label>Stock: </label></th>
                <th><input type="number" name="stock"  class="inputText"></th>
            </tr>
            <tr>
                <th><label>Tipo de Producto: </label></th>
                <th>
                    <input type="radio" id="Cruceros" name="tipo" value="Cruceros">
                    <label for="Cruceros">Cruceros</label>
                    <input type="radio" id="Paquetes" name="tipo" value="Paquetes">
                    <label for="Paquetes">Paquetes</label><br>
                </th>
            </tr>
            <tr>
                <th><label>Subtipo de Producto: </label></th>
                <th>
                    <input type="radio" id="Popular" name="subtype" value="Popular">
                    <label for="Popular">Popular</label>
                    <input type="radio" id="Magicos" name="subtype" value="Magicos">
                    <label for="Magicos">Magicos</label><br>
                </th>
            </tr>
            </tbody>
            <tfoot>
            <th>
                <button class="buttonCancelar" >
                    <a href="shopAdmin" class="noDecoration">Cancelar</a>
                </button></th>
            <th><button type="submit" value="Editar" class="registrarOLogin">Editar</button></th>

            </tfoot>
        </table>
    </form>

<?php include "com/pieDePagina.php"; ?>

<?php } else {
    echo '<script type="text/javascript">
        alert("No se ha validado");
        window.location.href="/";
        </script>';
}
?>

</body>
</html>

