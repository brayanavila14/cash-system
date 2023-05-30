<?php
session_start();
include("base-de-datos.php");

if (isset($_POST['ingresar'])) {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $nombreEmpresa = trim($_POST['nombre_empresa']);

    if (empty($name) || empty($password) || empty($nombreEmpresa)) {
        echo '<div class="mensaje-error">¡No has ingresado todos los campos!</div>';
    } else {
        // Consulta para verificar si el usuario existe en la tabla "administrador"
        $consulta1 = "SELECT nombre_empresa, usuario, contraseña FROM administrador WHERE usuario='$name' AND nombre_empresa='$nombreEmpresa' LIMIT 1";
        $resultado1 = mysqli_query($conexion, $consulta1);

        if (mysqli_num_rows($resultado1) === 0) {
            echo '<div class="mensaje-error usuario">¡El usuario ' . $name . ' no existe, REGÍSTRATE!</div>';
        } else {
            $info1 = mysqli_fetch_assoc($resultado1);

            // Consulta para verificar si el usuario existe en la tabla correspondiente de "empleado_NombreEmpresa"
            $consulta2 = "SELECT contraseña FROM empleado_$nombreEmpresa WHERE usuario='$name' LIMIT 1";
            $resultado2 = mysqli_query($conexion, $consulta2);

            if (mysqli_num_rows($resultado2) === 0) {
                // El usuario existe en la tabla "administrador", se verifica la contraseña
                if ($info1 && $info1['contraseña'] === $password) {
                    $_SESSION['nombre'] = $name;
                    $_SESSION['contraseña'] = $password;
                    $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $name . '!</div>';
                    header("Location: php/inicio-administrador.php");
                    exit;
                } else {
                    echo '<div class="mensaje-error contraseña">' . $name . ' La contraseña es incorrecta.</div>';
                }
            } else {
                // El usuario existe en la tabla correspondiente de "empleado_NombreEmpresa", se verifica la contraseña
                $info2 = mysqli_fetch_assoc($resultado2);
                if ($info2 && $info2['contraseña'] === $password) {
                    $_SESSION['nombre'] = $name;
                    $_SESSION['contraseña'] = $password;
                    $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $name . '!</div>';
                    header("Location: php/inicio-empleado.php");
                    exit;
                } else {
                    echo '<div class="mensaje-error contraseña">' . $name . ' La contraseña es incorrecta.</div>';
                }
            }
        }
    }
}
?>
