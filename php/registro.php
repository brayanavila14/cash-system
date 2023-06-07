<?php
session_start();

// Verificar si la sesión "inicio" existe y tiene el valor true
if (!isset($_SESSION['inicio']) || $_SESSION['inicio'] !== true) {
    // La sesión "inicio" no existe o tiene otro valor, redireccionar al usuario o mostrar mensaje de error
    header("Location: ../index.php"); // Redireccionar a otra página
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilo-registro.css">
    <title>Registro usuario</title>
</head>
<body>
    <div class="contenedor">
        <div class="opciones">
            <div class="opcion admin">
                <a href="administrador.php">
                    <img src="../imagenes/admin.png">
                    <h5>Administrador</h5>
                </a>
            </div>
            <div class="opcion empleado">
                <a href="empleado.php">
                    <img src="../imagenes/empleados.png">
                    <h5>Empleado</h5>
                </a>
            </div>
        </div>
    </div>
</body>
</html>