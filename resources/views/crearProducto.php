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
                <th><input type="text" name="name"  class="inputText" required> </th>
                </p>
            </tr>
            <tr>
                <p>
                <th><label>Descripción:</label></th>
                <th><input type="text" name="description"  class="inputText" required></th>
                </p>
            </tr>
            <tr>
                <th><label>Precio del Producto en €: </label></th>
                <th><input type="number" name="price" class="inputText" required></th>
            </tr>
            <tr>
                <th><label>Fecha </label></th>
                <th><input type="text" name="date" class="inputText" required></th>
            </tr>
            <tr>
                <th><label>Stock: </label></th>
                <th><input type="number" name="stock"  class="inputText" required></th>
            </tr>
            <tr>
                <th><label>Tipo de Producto: </label></th>
                <th>
                    <input type="radio" id="Cruceros" name="type" value="Cruceros" required>
                    <label for="Cruceros">Cruceros</label>
                    <input type="radio" id="Paquetes" name="type" value="Paquetes">
                    <label for="Paquetes">Paquetes</label><br>
                    <input type="radio" id="Actividades" name="type" value="Actividades">
                    <label for="Actividades">Actividades</label><br>
                    <input type="radio" id="Escolares" name="type" value="Escolares">
                    <label for="Escolares">Escolares</label><br>
                </th>
            </tr>
            <tr>
                <th><label>Subtipo de Producto: </label></th>
                <th><input type="text" name="subtype" class="inputText" required></th>
            </tr>

            </tbody>
            <tfoot>
            <th>
                <button class="buttonCancelar" >
                    <a href="shopAdmin" class="noDecoration">Cancelar</a>
                </button></th>
            <th><button type="submit" value="Editar" class="registrarOLogin">Crear</button></th>

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

