<?php
        session_start();

        if (!$_SESSION['nombre']) {
            header("Location: ../index.php");
            exit;

            // Verificar si existe un mensaje en la variable de sesión
        } elseif (isset($_SESSION['mensaje'])) {
            echo $_SESSION['mensaje'];
            unset($_SESSION['mensaje']); // Limpiar el mensaje de la variable de sesión para que no se muestre nuevamente en futuras visitas
            }
    ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inicio-administrador.css">
    <title>Inicio - sistema de caja registradora</title>
</head>
<body>
    <div class="menu">
        <img class="imagenlogo" src="../imagenes/yo .jpg" onclick="btn()">
        <div class="menuoculto">
            <img src="../imagenes/yo .jpg">
            <h3>Brayan David Avila Orozco</h3>
            <h5 class="cargo">Empleado</h6>
            <hr>
            <h6 class="opc"><a href="../index.php">Cerrar sesión</a></h6>
        </div>
    </div>
    <div class="contenedor">
        <div class="opciones">
            <div class="opcion inventario">
                <a href="inventario.php">
                    <img src="../imagenes/inventario.png">
                    <h5>Inventario</h5>
                </a>
            </div>
            <hr>
            <div class="opcion caja">
                <a href="caja.php">
                    <img src="../imagenes/caja-registradora.png">
                    <h5>Caja registradora</h5>
                </a>
            </div>
        </div>
    </div>
    <script src="../js/funcionextras.js"></script>
    <?php
    include("base-de-datos.php");
    ?>

</body>
</html>