<?php
session_start();
include("base-de-datos.php");

if (isset($_POST['ingresar'])) {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $nombre_empresa = trim($_POST['nombre_empresa']);
    $newnombre_empresa = str_replace(" ", "_", $nombre_empresa);

    if (empty($nombre_empresa) || empty($name) || empty($password)) {
        echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
        exit;
    }

    // Verificar si el usuario es un administrador
    $consulta_admin = "SELECT nombre_empresa, usuario, contraseña FROM administrador WHERE usuario = '$name' LIMIT 1";
    $resultado_admin = mysqli_query($conexion, $consulta_admin);

    if (mysqli_num_rows($resultado_admin) > 0) {
        $info_admin = mysqli_fetch_assoc($resultado_admin);
        if ( $info_admin['contraseña'] = $password) {
            $_SESSION['empresa'] = $nombre_empresa;
            $_SESSION['nombre'] = $name;
            $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $name . '!</div>';
            header("Location: php/inicio-administrador.php");
            exit;
        } else {
            echo '<div class="mensaje-error">La contraseña es incorrecta.</div>';
            exit;
        }
    }

    // Verificar si el usuario es un empleado
    $consulta_empleado = "SELECT 'company_name' , 'username', 'password' FROM empleados_" . $newnombre_empresa . " WHERE username = '$name' LIMIT 1";
    $resultado_empleado = mysqli_query($conexion, $consulta_empleado);

    if (mysqli_num_rows($resultado_empleado) > 0) {
        $info_empleado = mysqli_fetch_assoc($resultado_empleado);
        if ($info_empleado['contraseña'] = $password) {
            $_SESSION['empresa'] = $nombre_empresa;
            $_SESSION['nombre'] = $name;
            $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $name . '!</div>';
            header("Location: php/inicio-empleado.php");
            exit;
        } else {
            echo '<div class="mensaje-error">La contraseña es incorrecta.</div>';
            exit;
        }
    }

    // Si no se encuentra el usuario en ninguna categoría
    echo '<div class="mensaje-error">El usuario no existe en la empresa ' . $nombre_empresa . ', REGÍSTRESE.</div>';
}

mysqli_close($conexion);
?>

