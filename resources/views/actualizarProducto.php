
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

<?php  $product = \App\Products::where('id', $id)->first(); ?>

<section>
<header class="encabezado">
    <p>Actualice el producto de tipo: <?php echo $product->type?> </p>
</header>



    <form method="post" action="procesar_producto_actualizado">
    <?= csrf_field() ?>
    <fieldset>
        <legend>Actualizar los datos del producto</legend>
        <p>
            <label> Nombre del producto:
                <input type="text" name="name" value="<?php echo $producto->nombreProducto?>" required/>
            </label>
        </p>
        <p>
            <label>Descripción del Producto:
                <textarea rows="3" name="descripcionProducto" required><?php echo $producto->descripcionProducto;?></textarea>
            </label>
        </p>
        <p>
            <label>Precio (€):
                <input type="number" name="precioProducto" value="<?php echo $producto->precioProducto;?>" required/>
            </label>
        </p>
        <p>
            <label>Stock Actual:
                <input type="number" name="stockProducto" value="<?php echo $producto->stockProducto?>" required/>
            </label>
        </p>
        <input type="hidden" name="idProducto" value="<?php echo $producto->id ?>">

        <input type="reset"/>
        <input type="submit" value="Actualizar"/>
    </fieldset>
</form>
</section>
<?php include "com/pieDePagina.php"; ?>

</body>
</html>

