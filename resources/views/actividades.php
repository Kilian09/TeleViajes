<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Actividades</title>

    <?php include "com/estilos.php"?>
    <?php include "com/scripts.php"?>

</head>

<body>

<?php include "com/cabecera.php"?>

    <div class="container" style="padding-top: 30px;">
        <h1>las actividades más vendidas</h1>
        <div class="row">

            <?php
            if (isset($products, $activities)){
            foreach ($products as $product){
            if($product->type == "Actividades"){
            foreach ($activities as $activity){
            if($product->id == $activity->id_product) {
                if($activity->type == "Populares") {  ?>

            <div class="col-sm-6 col-md-4">
                <div class="box">
                    <div class="box-img"><img src="assets/img/esqui.jpg" alt="Montañismo" style="text-align: center;"></div>
                    <div class="box-content">
                        <h4 class="title"><?php echo $activity->name ?></h4>
                        <p class="description"><?php echo $activity->description ?>. Por <?php echo $activity->price?>. <?php echo $activity->date?>. Quedan <?php echo $activity->stock?> plazas libres.</p>
                        <ul class="social-links" style="text-align: center;">
                            <li><a href="#"><i class="fa fa-shopping-cart" style="font-size: 30px;"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>

            <?php }}}}}} ?>

    </div>

    <div class="container" style="padding-top: 30px;">
        <h1>las Actividades exclusivas</h1>
        <div class="row">
            <?php
            if (isset($products, $activities)){
            foreach ($products as $product){
            if($product->type == "Actividades"){
            foreach ($activities as $activity){
            if($product->id == $activity->id_product) {
            if($activity->type == "Exclusivas") {  ?>

                <div class="col-sm-6 col-md-4">
                    <div class="box">
                        <div class="box-img"><img src="assets/img/esqui.jpg" alt="Montañismo" style="text-align: center;"></div>
                        <div class="box-content">
                            <h4 class="title"><?php echo $activity->name ?></h4>
                            <p class="description"><?php echo $activity->description ?>. Por <?php echo $activity->price?>. <?php echo $activity->date?>. Quedan <?php echo $activity->stock?> plazas libres.</p>
                            <ul class="social-links" style="text-align: center;">
                                <li><a href="#"><i class="fa fa-shopping-cart" style="font-size: 30px;"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

            <?php }}}}}} ?>
    </div>

    <div class="container" style="padding-top: 30px;">
        <h1>las actividades más salvajes</h1>
        <div class="row">

            <?php
            if (isset($products, $activities)){
                foreach ($products as $product){
                    if($product->type == "Actividades"){
                        foreach ($activities as $activity){
                            if($product->id == $activity->id_product) {
                                if($activity->type == "Salvajes") {  ?>

                                    <div class="col-sm-6 col-md-4">
                                        <div class="box">
                                            <div class="box-img"><img src="assets/img/esqui.jpg" alt="Montañismo" style="text-align: center;"></div>
                                            <div class="box-content">
                                                <h4 class="title"><?php echo $activity->name ?></h4>
                                                <p class="description"><?php echo $activity->description ?>. Por <?php echo $activity->price?>. <?php echo $activity->date?>. Quedan <?php echo $activity->stock?> plazas libres.</p>
                                                <ul class="social-links" style="text-align: center;">
                                                    <li><a href="#"><i class="fa fa-shopping-cart" style="font-size: 30px;"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>

                                <?php }}}}}} ?>

    </div>

    <?php include "com/pieDePagina.php"?>

</body>

</html>
