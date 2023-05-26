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
    <div class="enunciado">
        <h1>Sistema de caja registradora </h1>
        <p>Bienvenido a cash system, estamos para servirte</p>
    </div>
    <div class="ing-reg">
        <h1>Cash system</h1>
        <form id="formulario" method="post">
            <input type="text" placeholder="Usuario" name="name" id="usuario">
            <input type="password" placeholder="Contraseña" name="password" id="clave"><img src="../imagenes/ojo-ver.png" class="ojo ver" onclick="mostrarContrasena()">
            <input type="submit" id="ing"  name="ingresar" value="Ingresar">
        </form>
        <hr>
        <a href="registro.php"><button id="reg">Registrar</button></a>
    </div>
   
    <?php
        include("validar.php"); 
    ?>
    <script src="../js/funcionextras.js"></script>
</body>
</html>