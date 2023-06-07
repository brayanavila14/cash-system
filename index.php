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
        <form method="post">
            <input type="text" placeholder="Nombre de la empresa" name="nombre_empresa" autocomplete="off">
            <input type="text" placeholder="Usuario" name="name" autocomplete="off">
            <input type="password" placeholder="Contraseña" name="password" autocomplete="off">
            <input type="submit" id="ing" name="ingresar" value="Ingresar">
        </form>
        <hr>
        <form action="php/registro.php" method="post">
            <input type="submit" id="reg" name="registrar" value="Registrar">
        </form>
    </div>
    <?php

    session_start();

    include("php/validar.php"); 
    
    // Verificar si se le dio click al botón "Registrar"
    if (isset($_POST['registrar'])) {
        
        $_SESSION['inicio'] = true; // Crear sesión con nombre "inicio" y valor true
    }

    // Verificar si existe un mensaje en la variable de sesión
    if (isset($_SESSION['mensaje'])) {
    echo $_SESSION['mensaje'];
    unset($_SESSION['mensaje']); // Limpiar el mensaje de la variable de sesión para que no se muestre nuevamente en futuras visitas
    }
    ?>
    <script src="../js/funcionextras.js"></script>
</body>
</html>
