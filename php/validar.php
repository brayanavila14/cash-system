<?php

session_start();

include("base-de-datos.php");


// Verificar si se ha enviado el formulario
if (isset($_POST['ingresar'])) {

    // se guardan las variables...
    $name = trim($_POST['name']);
    $password = trim($_POST['password']);

    //si el usuario y la contraseña están vacíos...
    if (empty($name) && empty($password)) {
        echo '<div class="mensaje-error">¡No has escrito nada!</div>';
    } elseif (empty($name)) {
        echo '<div class="mensaje-error usuario">¡No has escrito el usuario!</div>';
    } elseif (empty($password)) {
        echo '<div class="mensaje-error contraseña">¡No has escrito la contraseña!</div>';
    } else {

        //se escribe el código MySQL para seleccionar los datos que queremos.
        $consult1 = "SELECT usuario, Contraseña FROM administrador WHERE usuario='$name' LIMIT 1";
        $consult2 = "SELECT usuario, Contraseña FROM empleados WHERE usuario = '$name' LIMIT 1";

        //se hace la consulta a la base de datos.
        $result1 = mysqli_query($conexion, $consult1);
        $result2 = mysqli_query($conexion, $consult2);

        //se verifica si no hay filas con los datos guardados en las variables...
        if (mysqli_num_rows($result1) === 0 && mysqli_num_rows($result2) === 0) {
            echo '<div class="mensaje-error usuario">¡El usuario ' . $name . ' no existe, REGISTRATE!</div>';
        } else {
            $info1 = mysqli_fetch_assoc($result1);
            $info2 = mysqli_fetch_assoc($result2);

            //se verifica si la contraseña es correcta
            if ($info1 && $info1['Contraseña'] === $password) {
                 // Si la validación y autenticación son exitosas, se establece la sesión del usuario
                $_SESSION['loggedin'] = true;
                $_SESSION['nombre'] = $name;
                $_SESSION['contraseña'] = $password;
                $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $name . '!</div>';
                // Redirigir a otra página
                header("Location: php/inicio-administrador.php");
                exit; // Es importante incluir la instrucción exit para detener la ejecución del script después de la redirección.
            } elseif ($info2 && $info2['Contraseña'] === $password) {
                 // Si la validación y autenticación son exitosas, se establece la sesión del usuario
                $_SESSION['loggedin'] = true;
                $_SESSION['nombre'] = $name;
                $_SESSION['contraseña'] = $password;
                $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Bienvenido, ' . $name . '!</div>';
                // Redirigir a otra página 
                header("Location: php/inicio-empleado.php");
                exit; // Es importante incluir la instrucción exit para detener la ejecución del script después de la redirección.
            } else {
                echo '<div class="mensaje-error contraseña">' . $name . ' La contraseña es incorrecta.</div>';
            }
        }
    }
}
?>

