<?php 
$conexion = mysqli_connect("localhost", "root", "", "cash system");

if ($conexion) {
    echo '<h3 class="estado bien"><p>En linea</p></h3>';
} else {
    echo '<h3 class="estado bien"><p>Desconectado</p></h3>';
}
?>
