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
