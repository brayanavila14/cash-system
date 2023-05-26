<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/cambio-de-contra.css">
    <title>Cambia de contraseña</title>
</head>
<body>
    <div class="contenedor">
        <div>
            <form method="post">
                <input id="button" name="aceptar" type="submit" value="confirmar">
                <h3>Contraseña actual</h3>
                <input class="campo" name="contraactual" type="password" required>
                <h3>Nueva contraseña</h3>
                <input class="campo" name="newcontra"  type="password" required>
                <h3>Verifica tu Contraseña</h3>
                <input class="campo" name="verificacion" type="password" required>
            </form>
        </div>
    </div>
    <?php 
    include("procesocontraactualizar.php");
    ?>
</body>
</html>