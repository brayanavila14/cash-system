<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // El usuario no ha iniciado sesión, redirigirlo a index.php
    header("Location: ../index.php");
    exit;
}

// Verificar si se ha enviado el formulario para ingresar un producto
if (isset($_POST['ingresar'])) {
    $codigo = $_POST['codigo'];
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

    // Verificar si la sesión "factura" existe, de lo contrario, crearla
    if (!isset($_SESSION['factura'])) {
        $_SESSION['factura'] = array();
    }

    // Agregar el producto a la sesión "factura"
    $_SESSION['factura'][] = array(
        'codigo' => $codigo,
        'nombre' => $nombre,
        'precio' => $precio,
        'cantidad' => $cantidad
    );
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/caja.css">
    <title>Caja - Sistema caja registradora</title>
</head>
<body>
<div class="campo">
    <h4>codigo</h4>
    <input type="text" placeholder="codigo del producto" name="codigo">
</div>
<div class="campo">
    <h4>Nombre</h4>
    <input type="text" placeholder="Nombre del producto" name="nombre">
</div>
<div class="campo">
    <h4>Precio</h4>
    <input type="number" placeholder="Precio actual" readonly name="precio">
</div>
<div class="campo">
    <h4>Cantidad</h4>
    <input type="number" placeholder="Cantidad comprada" name="cantidad">
</div>
<div class="botones">
    <button type="submit" name="ingresar">Ingresar</button>
</div>
</body>
</html>