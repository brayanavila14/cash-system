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
        <h1 class="tittle">Inventario</h1>
        <?php

            // Generar ID aleatorio de 8 caracteres alfanuméricos
            // primero divido en codigo en dos partes, una que va a hacer la especial y la otra la común.

            // parte especial
            $part1 = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 4);

            // parte común
            $part2 = substr(str_shuffle('0123456789'), 0, 4);

            // se genera un codigo especial para el administrador
            $idproduct = $part1. '-'. $part2 ;

        ?>
        <form  method="POST">
            <div class="contenido">
           
                <h3>ID del producto</h3>
                <input id="id" class="campo" name="id" type="text" value="<?php echo $idproduct; ?>" readonly>

                <h3>Nombre del producto</h3>
                <input class="campo" name="nombre" type="text" placeholder="Ingrese el nombre por kilogramo o cantidad" autocomplete="off">

                <h3>Precio actual</h3>
                <input class="campo" name="precio" type="number" placeholder="Ingrese el precio actual" autocomplete="off">

                <h3>Cantidad disponible</h3>
                <input type="number" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad disponible" required>

                <input id="agregar-product" type="submit" name="agregar" value="Agregar producto">
                <input id="boton-inventario" type="button" value="ver inventario" onclick="location.href='../php/inventariolista.php';">

            </div>
        </form>
    </div>
</body>
</html>
