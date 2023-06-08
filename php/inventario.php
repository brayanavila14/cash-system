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
    <div class="container">
        <h1>Inventario</h1>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="identificador">Identificador</label>
                <input type="text" id="identificador" name="identificador" placeholder="Ingrese el identificador" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre por peso</label>
                <input type="text" id="nombre" name="nombre" placeholder="Ingrese el nombre por peso" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio actual</label>
                <input type="number" id="precio" name="precio" placeholder="Ingrese el precio actual" required>
            </div>
            <div class="form-group">
                <label for="cantidad">Cantidad disponible</label>
                <input type="number" id="cantidad" name="cantidad" placeholder="Ingrese la cantidad disponible" required>
            </div>
            <button type="submit">Agregar producto</button>
        </form>
    </div>
</body>
</html>
