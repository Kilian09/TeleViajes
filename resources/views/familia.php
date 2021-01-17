<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Familias</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body style="background: url(&quot;assets/img/intro-bg.jpg&quot;), #c9c9c9;">

<?php include "com/cabecera.php"?>


<div class="timeline time-body">
    <?php
    if (isset($products, $familias)){
        foreach ($products as $product){
            if($product->type == "Familias"){
                foreach ($familias as $familia){
                    if($product->id == $familia->id_product) {
                        if(($product->id)%2 == 0){
                            ?>
                            <div class="time-container left">
                                <div class="time-content" style="background: url(&quot;assets/img/roma.jpg&quot;) bottom / cover;">
                                    <h2 class="text-right" style="color: var(--dark);"><?php echo $familia->date ?></h2>
                                    <p class="text-right" style="color: var(--danger);text-align: left;font-family: Cabin, sans-serif;font-size: 18px;height: 32px;"><?php echo $familia->name ?>.<br></p>
                                    <p><?php echo $familia->description?>. Por solo <?php echo $familia->price ?>. <?php echo $familia->stock ?> plazas libres. <br></p>

                                    <form method="get" action="/addCart/<?php echo $product->id ?>">
                                        <input type="number" name="amount" value="1" min="1">
                                        <button type="submit"><i class="fa fa-shopping-cart" style="font-size: 30px;"></i></button>
                                    </form>

                                </div>
                            </div>
                        <?php }else{?>
                            <div class="time-container right">
                                <div class="time-content" style="background: url(&quot;assets/img/roma.jpg&quot;) bottom / cover;">
                                    <h2 class="text-right" style="color: var(--dark);"><?php echo $familia->date ?></h2>
                                    <p class="text-right" style="color: var(--danger);text-align: left;font-family: Cabin, sans-serif;font-size: 18px;height: 32px;"><?php echo $familia->name ?>.<br></p>
                                    <p><?php echo $familia->description?>. Por solo <?php echo $familia->price ?>. <?php echo $familia->stock ?> plazas libres. <br></p>

                                    <form method="get" action="/addCart/<?php echo $product->id ?>">
                                        <input type="number" name="amount" value="1" min="1">
                                        <button type="submit"><i class="fa fa-shopping-cart" style="font-size: 30px;"></i></button>
                                    </form>

                                </div>
                            </div>


                        <?php }}}}}} ?>

</div>

<?php include "com/pieDePagina.php"?>

</html>
