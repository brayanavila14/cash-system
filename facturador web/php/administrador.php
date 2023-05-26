<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/registro-formulario.css">
    <title>Registro administrador</title>
</head>
<body>
    <div class="contenedor">
        <form id="formulario" method="post">
            <div class="izq">
                <h3>Codigo empresa</h3>
                <input id="Codigo" class="campo" type="text" readonly>
                <h3>Nombre empresa</h3>
                <input class="campo" name="nom-empresa" type="text" autocomplete="off">
                <h3>Correo</h3>
                <input class="campo" name="correo" type="email" autocomplete="off">
            </div>
            <div class="der">
                <h3>Usuario</h3>
                <input class="campo" name="usuario"  type="text" autocomplete="off">
                <h3>Contraseña</h3>
                <input id="clave" class="campo" name="contraseña" type="password" autocomplete="off"><img src="../imagenes/ojo-ver.png" class="ojo uno" onclick="mostrarContrasena()">
                <h3>Verifica tu contraseña</h3>
                <input id="clave2" class="campo" name="contraseña2" type="password" autocomplete="off"><img src="../imagenes/ojo-ver.png" class="ojo dos" onclick="mostrarContrasena2()">
            </div>
            <input id="Registrar" type="submit" name="registra" value="registrar">
        </form>
    </div>
    <?php 
    include("registroadmin.php");
    ?>
    <script src="../js/registroadmin.js"></script>
</body>
</html>