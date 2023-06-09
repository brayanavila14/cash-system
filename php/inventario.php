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
        <?php

            // Generar ID aleatorio de 8 caracteres alfanuméricos
            // primero divido en codigo en dos partes, una que va a hacer la especial y la otra la común.

            // parte especial
            $part1 = substr(str_shuffle('abcdefghijklmnopqrstuvwxyz'), 0, 4);

            // parte común
            $part2 = substr(str_shuffle('0123456789'), 0, 6);

            // se genera un codigo especial para el administrador
            $idproduct = $part1. '-'. $part2 ;

        ?>
        <form  method="POST">
            <div class="contenido">
                <input id="id" class="campo" name="id" type="text" value="<?php echo $idproduct; ?>" readonly>
                <input class="campo" name="nombre" type="text" placeholder="Nombre por kilogramo o volumen" autocomplete="off">
                <input class="campo" name="precio" type="number" placeholder="Precio actual por unidad o kilo" autocomplete="off">
                <input id="cantidad" name="cantidad" type="number" placeholder="Cantidad disponible">

                <input id="agregar-product" type="submit" name="agregar" value="Agregar producto">
                <input id="update-product" type="submit" name="update" value="Actualizar producto">
                <input id="boton-inventario" type="button" value="Ver inventario" onclick="location.href='../php/inventariolista.php';">

            </div>
        </form>
    </div>
</body>
</html>
