<?php

include("base-de-datos.php");

if (isset($_POST['ingresar'])) {
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);
    $nombre_empresa = trim($_POST['nombre_empresa']);
    $newnombre_empresa  = str_replace(" ", "_", $nombre_empresa );

    if (empty($nombre_empresa) || empty($name) || empty($password)) {
        echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
        exit;
    }

    // Consulta para verificar si el usuario existe en la tabla "administrador"
    $consultaadmin = "SELECT nombre_empresa, usuario, contraseña FROM administrador WHERE usuario='$name' LIMIT 1";
    $resultadoadmin = mysqli_query($conexion, $consultaadmin);

    // Se verifica si existe la tabla de empleados de la empresa
    $consultatable = "SHOW TABLES LIKE 'empleados_" . $newnombre_empresa . "'";
    $resultadotable = mysqli_query($conexion, $consultatable);

    if (mysqli_num_rows($resultadotable) === 0) {
        echo '<div class="mensaje-error">¡La empresa ' . $nombre_empresa . ' no existe, por favor regístrese!</div>';
        exit;
    }

    if (mysqli_num_rows($resultadoadmin) === 0) {
        // El usuario no existe en la tabla "administrador"
        // Se verifica si el usuario existe en la tabla correspondiente de "empleados de la empresa"
        $consultaempleado = "SELECT company_name, username, password FROM empleados_" . $newnombre_empresa . " WHERE username='$name' LIMIT 1";
        $resultadoempleado = mysqli_query($conexion, $consultaempleado);

        if (mysqli_num_rows($resultadoempleado) === 0) {
            echo '<div class="mensaje-error usuario">¡El usuario ' . $name . ' no existe en la empresa ' . $nombre_empresa . ', REGÍSTRESE!</div>';
        } else {
            $info2 = mysqli_fetch_assoc($resultadoempleado);
            if ($info2 && $info2['password'] === $password) {
                $_SESSION['nombre'] = $name;
                $_SESSION['contraseña'] = $password;
                $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $name . '!</div>';
                header("Location: php/inicio-empleado.php");
                exit;
            } else {
                echo '<div class="mensaje-error contraseña">' . $name . ', la contraseña es incorrecta.</div>';
            }
        }
    } else {
        // El usuario existe en la tabla "administrador"
        $info1 = mysqli_fetch_assoc($resultadoadmin);
        if ($info1 && $info1['contraseña'] === $password) {
            $_SESSION['nombre'] = $name;
            $_SESSION['contraseña'] = $password;
            $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $name . '!</div>';
            header("Location: php/inicio-administrador.php");
            exit;
        } else {
            echo '<div class="mensaje-error contraseña">' . $name . ', la contraseña es incorrecta.</div>';
        }
    }
}
?>
