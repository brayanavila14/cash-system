<?php
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    // El usuario no ha iniciado sesión, redirigirlo a index.php
    header("Location: ../index.php");
    exit;
}

// El usuario ha iniciado sesión, puedes continuar con el código de tu archivo
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
    <div class="titular">
        <a id="enlace"><button id="atras" onclick="cambioa()">Atras</button></a>
        <h1>Caja registradora</h1>
    </div>
    <div class="campo">
        <h4>codigo</h4>
        <input type="text" placeholder="codigo del producto">
    </div>
    <div class="campo">
        <h4>Nombre</h4>
        <input type="text" placeholder="Nombre del producto">
    </div>
    <div class="campo">
        <h4>Precio</h4>
        <input type="number" placeholder="Precio actual" readonly>
    </div>
    <div class="campo">
        <h4>Cantidad</h4>
        <input type="number" placeholder="Cantidad comprada">
    </div>
    <div class="botones">
        <button>Ingresar</button>
    </div>
    <hr>
    <div class="lista">
        <h4>codigo</h4>
        <h4>Nombre</h4>
        <h4>Precio</h4>
        <h4>Cantidad</h4>
        <h4>subtotal</h4>
    </div>
    <div class="contenido-lista">
        <div>
            <p class="cod">001</p>
            <p class="pdcto">Arroz suelto</p>
            <p class="Precio">4000</p>
            <p class="cant">10</p>
            <p class="subtotal">40000</p>
        </div>
        <hr>
    </div>
    <div class="pie">
        <h4 id="Total">Total</h4> <input type="number" readonly>
        <h4 id="Efectivo">Efectivo</h4> <input type="number">
        <h4 id="Devuelta">Devuelta</h4> <input  type="number" readonly>
        <button class="Limpiar"><p class="btn-limpiar">Limpiar</p></button>
        <button class="Cancelar"><p class="btn-cancelar">Cancelar</p></button>
    </div>
</body>
</html>