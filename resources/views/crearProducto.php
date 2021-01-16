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
<body class="fondo">

<?php include "com/cabecera.php"; ?>

<nav id="vertical">
    <ul>
        <li><a href="shopAdmin">Productos</a></li>
        <li><a href="listatransaciones" >Transacciones</a></li>
        <li><a href="crearProducto" class="active">Crear Productos</a></li>

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
        <h1 class="titulo">Añade un Producto</h1>

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

                    <input type="radio" id="Universitarios" name="type" value="Universitarios">
                    <label for="Universitarios">Universitarios</label><br>

                    <input type="radio" id="Vuelos" name="type" value="Vuelos">
                    <label for="Vuelos">Vuelos</label><br>

                    <input type="radio" id="Ancianos" name="type" value="Ancianos">
                    <label for="Ancianos">Ancianos</label><br>

                    <input type="radio" id="Familias" name="type" value="Familias">
                    <label for="Familias">Familias</label><br>

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

    </article>
</section>

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

