
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
        <input type="hidden" name="idProducto" value="<?php echo $product->id ?>">
        <input type="hidden" name="typeProducto" value="<?php echo $product->type ?>">

        <table>
            <tbody>

            <?php if($tipoControlador == 'Paquetes'){
            $paquete = \App\Paquetes::where('id_product', $id)->first();
            ?>
            <tr>
                <p>
                <th><label>Nombre del producto:</label></th>
                <th><input type="text" name="name"  class="inputText" value="<?php echo $paquete->name?>"> </th>
                </p>
            </tr>
            <tr>
                <p>
                <th><label>Descripción:</label></th>
                <th><input type="text" name="description"  class="inputText" value="<?php echo $paquete->description?>"></th>
                </p>
            </tr>
            <tr>
                <th><label>Precio del Producto en €: </label></th>
                <th><input type="number" name="price" class="inputText" value="<?php echo $paquete->price?>"></th>
            </tr>
            <tr>
                <th><label>Fecha: </label></th>
                <th><input type="text" name="date" class="inputText" value="<?php echo $paquete->date?>"></th>
            </tr>
            <tr>
                <th><label>Stock: </label></th>
                <th><input type="number" name="stock"  class="inputText" value="<?php echo $paquete->stock?>"></th>
            </tr>
            <tr>
                <tr>
                    <th><label>Subtipo de Producto: </label></th>
                    <th><input type="text" name="subtype" class="inputText" value="<?php echo $paquete->type?>"></th>
                </tr>
            </tr>

            <?php }elseif($tipoControlador == 'Cruceros'){
                $cruise = \App\Cruceros::where('id_product', $id)->first(); ?>
            <tr>
                <p>
                <th><label>Nombre del producto:</label></th>
                <th><input type="text" name="name"  class="inputText" value="<?php echo $cruise->name?>"> </th>
                </p>
            </tr>
            <tr>
                <p>
                <th><label>Descripción:</label></th>
                <th><input type="text" name="description"  class="inputText" value="<?php echo $cruise->description?>"></th>
                </p>
            </tr>
            <tr>
                <th><label>Precio del Producto en €: </label></th>
                <th><input type="number" name="price" class="inputText" value="<?php echo $cruise->price?>"></th>
            </tr>
            <tr>
                <th><label>Fecha: </label></th>
                <th><input type="text" name="date" class="inputText" value="<?php echo $cruise->date?>"></th>
            </tr>
            <tr>
                <th><label>Stock: </label></th>
                <th><input type="number" name="stock"  class="inputText" value="<?php echo $cruise->stock?>"></th>
            </tr>
            <tr>
            <tr>
                <th><label>Subtipo de Producto: </label></th>
                <th><input type="text" name="subtype" class="inputText" value="<?php echo $cruise->type?>"></th>
            </tr>
            </tr>
            <?php }elseif($tipoControlador == 'Actividades'){
                $activity = \App\Actividades::where('id_product', $id)->first(); ?>
                <tr>
                    <p>
                    <th><label>Nombre del producto:</label></th>
                    <th><input type="text" name="name"  class="inputText" value="<?php echo $activity->name?>"> </th>
                    </p>
                </tr>
                <tr>
                    <p>
                    <th><label>Descripción:</label></th>
                    <th><input type="text" name="description"  class="inputText" value="<?php echo $activity->description?>"></th>
                    </p>
                </tr>
                <tr>
                    <th><label>Precio del Producto en €: </label></th>
                    <th><input type="number" name="price" class="inputText" value="<?php echo $activity->price?>"></th>
                </tr>
                <tr>
                    <th><label>Fecha: </label></th>
                    <th><input type="text" name="date" class="inputText" value="<?php echo $activity->date?>"></th>
                </tr>
                <tr>
                    <th><label>Stock: </label></th>
                    <th><input type="number" name="stock"  class="inputText" value="<?php echo $activity->stock?>"></th>
                </tr>
                <tr>
                <tr>
                    <th><label>Subtipo de Producto: </label></th>
                    <th><input type="text" name="subtype" class="inputText" value="<?php echo $activity->type?>"></th>
                </tr>
                </tr>

            <?php  }elseif($tipoControlador == 'Escolares'){
                $escolares = \App\Escolares::where('id_product', $id)->first(); ?>
                <tr>
                    <p>
                    <th><label>Nombre del producto:</label></th>
                    <th><input type="text" name="name"  class="inputText" value="<?php echo $escolares->name?>"> </th>
                    </p>
                </tr>
                <tr>
                    <p>
                    <th><label>Descripción:</label></th>
                    <th><input type="text" name="description"  class="inputText" value="<?php echo $escolares->description?>"></th>
                    </p>
                </tr>
                <tr>
                    <th><label>Precio del Producto en €: </label></th>
                    <th><input type="number" name="price" class="inputText" value="<?php echo $escolares->price?>"></th>
                </tr>
                <tr>
                    <th><label>Fecha: </label></th>
                    <th><input type="text" name="date" class="inputText" value="<?php echo $escolares->date?>"></th>
                </tr>
                <tr>
                    <th><label>Stock: </label></th>
                    <th><input type="number" name="stock"  class="inputText" value="<?php echo $escolares->stock?>"></th>
                </tr>
                <tr>
                <tr>
                    <th><label>Subtipo de Producto: </label></th>
                    <th><input type="text" name="subtype" class="inputText" value="<?php echo $escolares->type?>"></th>
                </tr>
                </tr>
            <?php }?>





            <?php }?>

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

