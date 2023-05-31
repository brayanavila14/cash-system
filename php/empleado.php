<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro-formulario.css">
    <title>Registro empleado</title>
</head>
<body>
    <div class="contenedor">
        <form id="formulario" method="post">
            <h1 class="tittle">Registro</h1>
            <div class="contenido">
            <?php

            session_start();

            if (!$_SESSION['registrar']) {

            header("Location: ../index.php");
            exit;
            }
            // Generar ID aleatorio de 8 caracteres alfanuméricos
            $codempleado = substr(str_shuffle('abcdefghijklmnopqrstuvwxyzABCDFGHIFKLMNOPQRSTUVWXYZ0123456789'), 0, 8);
            ?>
                <input id="codigo" class="campo" name="cod-empleado" type="text" placeholder="Código de empleado" value="<?php echo $codempleado; ?>" readonly>
                <input class="campo" name="nombre_empresa" type="text" placeholder="Nombre de la empresa" autocomplete="off">
                <input class="campo" name="email" type="email" placeholder="Correo electrónico" autocomplete="off">
                <input class="campo" name="usuario" type="text" placeholder="Usuario" autocomplete="off">
                <input id="clave" class="campo" name="contraseña" type="password" placeholder="Contraseña" autocomplete="off">
                <input id="clave2" class="campo" name="contraseña2" type="password" placeholder="Verifica tu contraseña" autocomplete="off">
            </div>
            <input id="registrar" class="boton-registrar" type="submit" name="registra" value="Registrar">
        </form>
    </div>
    
    <?php 
    include("registroemp.php");
    ?>
    <script src="../js/funcionextras.js"></script>
</body>
</html>
