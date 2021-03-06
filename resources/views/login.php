<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Login</title>

    <?php include "com/estilos.php" ?>
    <?php include "com/scripts.php" ?>

</head>

<body>

<?php include "com/cabecera.php" ?>

<div class="login-dark" style="background: url(&quot;assets/img/bledd.jpg&quot;) center / cover;">

    <form method="post" action="procesar_login">
        <?= csrf_field() ?>
        <h2 class="sr-only">Login Form</h2>
        <div class="illustration"><i class="icon ion-paper-airplane" style="color: var(--cyan);"></i></div>
        <div class="form-group"><input class="form-control" type="email" name="email" placeholder="Correo Electrónico">
        </div>
        <?php
        if (isset($usuarioInexistente)) {
            echo "<script>window.alert('Usuario inexistente, inténtelo de nuevo.')</script>";
        }
        ?>
        <div class="form-group"><input class="form-control" type="password" name="password" placeholder="Contraseña">
        </div>
        <?php
        if (isset($contraseñaIncorrecta)) {
            echo "<script>window.alert('Contraseña incorrecta, inténtelo de nuevo.')</script>";
        }
        ?>
        <div class="form-group">
            <button class="btn btn-primary btn-block" type="submit">Iniciar sesion</button>
        </div>
        <a class="forgot" href="register">No te has registrado aún?</a>
    </form>
</div>


<?php include "com/pieDePagina.php"; ?>

</body>

</html>
