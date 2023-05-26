<?php 
$conexion = mysqli_connect("localhost", "root", "", "cash system");

if ($conexion) {
    ?>
        <h3 class="estado bien"><p>En linea</p></h3>
    <?php
} else {
    ?>
        <h3 class="estado error"><p>Desconectado</p></h3>
    <?php
}

?>