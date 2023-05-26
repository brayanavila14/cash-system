<?php

    include("base-de-datos.php");

    if (isset($_POST['ingresar'])) {
        $name = trim($_POST['name']);
        $password = trim($_POST['password']);
        $buscar1 = "SELECT Usuario, Contraseña FROM administrador WHERE Usuario = '$name' and Contraseña = '$password' LIMIT 1" ;
        $buscar2 = "SELECT Nombre, Contraseña FROM empleado WHERE Nombre = '$name' and Contraseña = '$password' LIMIT 1";
        $resultadobuscar1 = mysqli_fetch_assoc(mysqli_query($conexion, $buscar1));
        $resultadobuscar2 = mysqli_fetch_assoc(mysqli_query($conexion, $buscar2));

        if (strlen($name) == 0 && strlen($password) == 0)  {
            ?>
            <h3>¡No has escrito nada!</h3>;
            <?php
            return;
        } else {
            if (strlen($name) == 0) {
                ?>
                <h3>¡Por favor ingresa el usuario!</h3>;
                <?php 
                return;
            } else {
                if (strlen($password) == 0) {
                    ?>
                    <h3>¡Por favor ingresa la conraseña!</h3>;
                    <?php 
                    return;
                } else {
                    if ($name != $resultadobuscar1['Usuario'] && $name != $resultadobuscar2['Nombre']) {
                        ?>
                        <h3>¡El usuario no existe, REGISTRATE!</h3>;
                        <?php 
                    } else {
                        if ($password !=  $resultadobuscar1['Contraseña'] && $password != $resultadobuscar2['Contraseña']) {

                            echo $name, "La contraseña es incorrecta";
                            return;

                        } else {
                            if ($name == $resultadobuscar1['Usuario'] && $password ==  $resultadobuscar1['Contraseña']) {

                                header("Location: inicio-administrador.php");
                                
                            }
                            if ($name == $resultadobuscar2['Nombre'] && $password ==  $resultadobuscar2['Contraseña']) {

                                header("Location: inicio-empleado.php");
                                
                            }
                        }
                    }
                }
            }
        }
    }
?>