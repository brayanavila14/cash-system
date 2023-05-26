<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css">
    <title>Inventario - Sistema caja registradora</title>
</head>
<body>
    <div class="titular">
        <a href="inicio-administrador.php"><button class="atras">Atras</button></a>
        <button class="Buscar">Buscar</button>
        <h1>Inventario</h1>
    </div>
    <div class="campo">
        <h4>codigo</h4>
        <input id="cod" type="text">
    </div>
    <div class="campo">
        <h4>Nombre</h4>
        <input id="nombre" type="text" placeholder="Nombre del producto">
    </div>
    <div class="campo">
        <h4>Precio</h4>
        <input id="precio" type="number" placeholder="Precio actual">
    </div>
    <div class="campo">
        <h4>Cantidad</h4>
        <input id="cant" type="number" placeholder="Cantidad disponible">
    </div>
    <div class="botones">
        <button class="btn ingreso">Ingresar</button>
        <button class="btn actualiza">Actualizar</button>
    </div>
    <hr>
    <div class="lista">
        <h4>codigo</h4>
        <h4>Nombre</h4>
        <h4>Precio</h4>
        <h4>Cantidad</h4>
    </div>
    <div class="contenido-lista">
        <div id="div1" class="products">
            <p class="cod">001</p>
            <p class="pdcto">Arroz suelto</p>
            <p class="precio">4000</p>
            <p class="cant">40</p>
        </div>
        <hr>
    </div>
    <script src="../js/inventario.js"></script>
</body>
</html>