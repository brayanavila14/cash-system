<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventario.css">
    <title>Inventario</title>
</head>
<body>
    <div class="contenedor">
        <h1 class="tittle">Registro de Productos</h1>        
            <div class="contenido">
            <form  method="POST">
                <input class="campo" name="nombre" type="text" placeholder="Nombre por kilogramo o volumen" autocomplete="off">
                <input class="campo" name="precio" type="number" placeholder="Precio actual por unidad o kilo" autocomplete="off">
                <input id="cantidad" name="cantidad" type="number" placeholder="Cantidad disponible">

                <input id="agregar-product" type="submit" name="agregar" value="Agregar producto">
                <input id="update-product" type="submit" name="update" value="Actualizar producto">
                <input id="boton-inventario" type="button" value="Ver inventario" onclick="location.href='../php/inventariolista.php';">
            </form>
            </div>
        
    </div>
    <?php
    include("ingresoproducto.php");
    ?>
</body>
</html>
