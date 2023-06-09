// Obtener el precio al ingresar el nombre del producto
document.querySelector('input[name="nombre"]').addEventListener('blur', function() {
    obtenerPrecio();
});

function obtenerPrecio() {
    var nombreProducto = document.querySelector('input[name="nombre"]').value;

    // Realizar una solicitud AJAX para obtener el precio del producto desde el servidor
    // Aquí puedes implementar tu lógica para obtener el precio del producto en PHP

    // Simulación de obtención del precio
    var precio = obtenerPrecioDelServidor(nombreProducto); // Función ficticia para obtener el precio

    // Actualizar el campo de precio en el formulario
    document.getElementById('precio').value = precio;
}

function obtenerPrecioDelServidor(nombreProducto) {
    // Aquí puedes realizar una solicitud al servidor para obtener el precio del producto
    // y devolverlo en función del nombre del producto proporcionado
    // En este ejemplo, simplemente se devuelve un precio aleatorio

    var precios = {
        'producto1': 10,
        'producto2': 20,
        'producto3': 30
    };

    return precios[nombreProducto] || 0; // Devuelve el precio correspondiente al nombre del producto o 0 si no se encuentra
}