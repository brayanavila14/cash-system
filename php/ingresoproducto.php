<?php
session_start();
include("base-de-datos.php");

$id = mysqli_real_escape_string($conexion, trim($_POST['id']));
$name = mysqli_real_escape_string($conexion, trim($_POST['nombre']));
$precio = mysqli_real_escape_string($conexion, trim($_POST['precio']));
$cantidad = mysqli_real_escape_string($conexion, trim($_POST['cantidad']));

$newnombre_empresa =  str_replace(" ", "_", $_SESSION['empresa'] );

if (empty($id) || empty($name) || empty($precio) || empty($cantidad)) {
    echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
    exit;
} else {

    if (isset($_POST['agregar'])) {

        // Verificar si el producto ya está registrado
        $consultaproduct = "SELECT * FROM `inventario_" . $newnombre_empresa . " WHERE 	nombre_producto ='$name' LIMIT 1";;
        $resultadoproduct = mysqli_query($conexion, $consultaproduct);
    
        if ( $resultadoproduct > 0) {
            echo '<div class="mensaje-error">¡El producto ya ha sido ingresado!</div>';
            exit;
        } else {
            $insertproduct =  "INSERT INTO inventario_" . $newnombre_empresa . "(codigo_producto, nombre_producto, precio_actual, cantidad_disponible) VALUES ('$id','$name','$precio','$cantidad')";
            $resultadoinsert = mysqli_query($conexion, $consultainsert);

            if ($resultadoinsert) {
                echo '<div class="mensaje-exito">¡El producto se ha ingresado con exito!</div>';
                exit;
            } else {
                echo '<div class="mensaje-error">¡ups...hubo un error, vuelve a intentarlo!</div>';
                exit;
            }
        }
    }
    if (isset($_POST['update'])) {
        // Verificar si el producto ya está registrado
        $consultaproduct = "SELECT * FROM `inventario_" . $newnombre_empresa . " WHERE 	nombre_producto ='$name' LIMIT 1";
        $resultadoproduct = mysqli_query($conexion, $consultaproduct);
        
        if ($resultadoproduct > 0) {
            $actualizar = "UPDATE `inventario_" . $newnombre_empresa . " SET nombre_producto='$name',precio_actual='$precio' where codigo_producto='$id'";
            $resultadoactualizar = mysqli_query($conexion, $actualizar);

            if ($resultadoactualizar ) {
                echo '<div class="mensaje-exito">¡El producto se ha actualizado con exito!</div>';
                exit;
            } else {
                echo '<div class="mensaje-error">¡ups...hubo un error, vuelve a intentarlo!</div>';
                exit;
            }
        } else {
            echo '<div class="mensaje-error">¡El producto no ha sido ingresado, por favor ingreselo!</div>';
            exit;
        }
    }    
}

