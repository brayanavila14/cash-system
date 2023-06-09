<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/inventariolista.css">
    <title>Inventario</title>
</head>
<body>
    <input class="volver" type="button" value="Volver" onclick="location.href='inventario.php';">
    <div class="encabezado">   
        <h2>Inventario</h2>
    </div>
    <div class="subencabezado">
        <h1 class="arregloinicial">Nombre del producto</h1>
        <h1 class="texttittle">Precio actual</h1>
        <h1 class="arreglofinal">Cantidad disponible</h1> 
    </div>
        <?php
        session_start();
        include("base-de-datos.php");

        $newnombre_empresa = str_replace(" ", "_", $_SESSION['empresa']);

        // Consulta para obtener los registros de la tabla inventario
        $consulta = "SELECT * FROM inventario_" . $newnombre_empresa;
        $resultado = mysqli_query($conexion, $consulta);

        // Verificar si se encontraron registros
        if (mysqli_num_rows($resultado) > 0) {
            // Iterar sobre los registros y mostrarlos
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $nombre = $fila['nombre_producto'];
                $precio = $fila['precio_actual'];
                $cantidad = $fila['cantidad_disponible'];

                // Mostrar los datos en el HTML
                echo '<div class="inventario">';
                echo '<div id="nameproduct">';
                echo '<p class="nombre">' . $nombre . '</p>';
                echo '</div>';
                echo '<div id="precioproduct">';
                echo '<p class="precio">$' . $precio . '</p>';
                echo '</div>';
                echo '<div id="cantproduct">';
                echo '<p class="cantidad">' . $cantidad . '</p>';
                echo '</div>';
                echo '</div>';
            }
        } else {
        echo '<h1 class="mensaje-error">No hay productos en el inventario.</h1>';
        }

    mysqli_close($conexion);
?>
</body>
</html>