<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo-principal.css">
    <title>sistema de facturación</title>
</head>
<body>
    <header>
        <h1>Sistema de Caja Registradora</h1>
        <p>Bienvenido a Cash System, estamos para servirte</p>
    </header>
    <div class="ing-reg">
        <h1>Cash system</h1>
        <form id="formulario" method="post">
            <input type="text" placeholder="Usuario" name="name" id="usuario" autocomplete="off">
            <input type="password" placeholder="Contraseña" name="password" id="clave" autocomplete="off">
            <div class="ojo" onclick="togglePasswordVisibility()"></div>
            <input type="submit" id="ing" name="ingresar" value="Ingresar">
        </form>
        <hr>
        <input type="button" id="reg" value="Registrar" onclick="window.location.href='php/registro.php';">
    </div>
    <?php
    include("php/validar.php"); 

    // Verificar si existe un mensaje en la variable de sesión
    if (isset($_SESSION['mensaje'])) {
    echo $_SESSION['mensaje'];
    unset($_SESSION['mensaje']); // Limpiar el mensaje de la variable de sesión para que no se muestre nuevamente en futuras visitas
    }
    ?>
    <script src="../js/funcionextras.js"></script>
</body>
</html>
