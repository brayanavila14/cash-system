<?php
        session_start();
            // Verificar si existe un mensaje en la variable de sesión
            if (isset($_SESSION['mensaje'])) {
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
            <h6 class="opc"><a href="cambio-de-contra.php">Cambiar contraseña</a></h6>
            <h6 class="opc cuenta"><a href="cambio-de-cuenta.html">Cambiar de cuenta</a></h6>
            <h6 class="opc cerrar"><a href="login.html">Cerrar sesión</a></h6>
        </div>
    </div>
    <div class="contenedor">
        <a href="inventario.html"><button><img src="../imagenes/inventario.png"><p>Inventario</p></button></a>
        <hr>
        <a href="caja.html"><button><img src="../imagenes/caja-registradora.png"><p>Caja</p></button></a>
    </div>
    <script src="../js/funcionextras.js"></script>
</body>
</html>