
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <base href="/" target="_top">
    <title>Actualizar Producto</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>
<body>

<?php include "com/cabecera.php"; ?>


<?php
if(isset($id)){
    $product = \App\Products::where('id', $id)->first();
    $tipoControlador = $product->type;
?>

<section>
<header class="encabezado">
    <p>Actualice el producto de tipo: <?php echo $tipoControlador?> </p>
</header>

    <form method="post" action="procesar_producto_actualizado">
        <?= csrf_field() ?>
        <table>
            <tbody>

            <?php if($tipoControlador == 'Paquetes'){
            $paquete = \App\Paquetes::where('id_product', $id)->first();
            ?>

            <tr>
                <p>
                <th><label>Nombre del producto:</label></th>
                <th><input type="text" name="name"  class="inputText" value="<?php echo $paquete->name?>" required> </th>
                </p>
            </tr>
            <tr>
                <p>
                <th><label>Descripción:</label></th>
                <th><input type="text" name="description"  class="inputText" value="<?php echo $paquete->description?>" required></th>
                </p>
            </tr>
            <tr>
                <th><label>Precio del Producto en €: </label></th>
                <th><input type="number" name="price" class="inputText" value="<?php echo $paquete->price?>" required></th>
            </tr>
            <tr>
                <th><label>Fecha: </label></th>
                <th><input type="text" name="date" class="inputText" value="<?php echo $paquete->date?>" required></th>
            </tr>
            <tr>
                <th><label>Stock: </label></th>
                <th><input type="number" name="stock"  class="inputText" value="<?php echo $paquete->stock?>" required></th>
            </tr>
            <tr>
                <th><label>Tipo de Producto: </label></th>
                <th>
                    <input type="radio" id="Cruceros" name="type" value="Cruceros" required>
                    <label for="Cruceros">Cruceros</label>
                    <input type="radio" id="Paquetes" name="type" value="Paquetes">
                    <label for="Paquetes">Paquetes</label><br>
                </th>
            </tr>
            <tr>
                <th><label>Subtipo de Producto: </label></th>
                <th>
                    <input type="radio" id="Popular" name="subtype" value="Popular" required>
                    <label for="Popular">Popular</label>
                    <input type="radio" id="Magicos" name="subtype" value="Magicos">
                    <label for="Magicos">Magicos</label><br>
                </th>
            </tr>

            <?php }} ?>

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
</section>
<?php include "com/pieDePagina.php"; ?>

</body>
</html>

