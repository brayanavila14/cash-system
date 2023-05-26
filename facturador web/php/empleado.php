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
            <div class="izq">
                <h3>Codigo empleado</h3>
                <input id="Codigo" class="campo" type="text" readonly>
                <h3>Codigo empresa</h3>
                <input class="campo" name="cod-empresa" type="text" autocomplete="off">
                <h3>Correo</h3>
                <input class="campo" name="correo" type="email" autocomplete="off">
            </div>
            <div class="der">
                <h3>Usuario</h3>
                <input class="campo" name="usuario"  type="text" autocomplete="off">
                <h3>Contraseña</h3>
                <input id="clave" class="campo" name="contraseña" type="password" autocomplete="off"><img src="../imagenes/ojo-ver.png" class="ojo uno" onclick="mostrarContrasena()">
                <h3>Verifica tu contraseña</h3>
                <input id="clavedos" class="campo" name="contraseña2" type="password" autocomplete="off"><img src="../imagenes/ojo-ver.png" class="ojo dos" onclick="mostrarContrasena2()">
            </div>
            <input id="Registrar" type="submit" name="registra" value="Registrar">
        </form>
    </div>
    <?php 
    include("registroemp.php");
    ?>
    <script src="../js/funcionextras.js"></script>
</body>
</html>