<?php
include("base-de-datos.php");

if (isset($_POST['registra'])) {
    $codempleado = trim($_POST['cod-empleado']);
    $nomempresa = trim($_POST['nom-empresa']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['contraseña']);
    $password2 = trim($_POST['contraseña2']);
    $correo = trim($_POST['correo']);

    // Verificar si el usuario ya está registrado
    $consultusername = "SELECT * FROM  $nomempresa WHERE usuario = '$usuario'";
    $resultusername = mysqli_query($conexion, $consultusername);

    if (mysqli_num_rows($resultusername) > 0) {
        echo '<h3 class="mensaje-error">¡El usuario ' . $usuario . ' ya está registrado!</h3>';
        exit;
    }

    if (empty($nomempresa)) {
        echo '<h3 class="mensaje-error">¡Por favor, ingresa el nombre de la empresa!</h3>';
        exit;
    }

    if (empty($usuario) || empty($password) || empty($password2) || empty($correo)) {
        echo '<h3 class="mensaje-error">¡No has ingresado todos los campos!</h3>';
        exit;
    }

    if (strlen($usuario) < 3) {
        echo '<h3 class="mensaje-error">¡El usuario es muy corto!</h3>';
        exit;
    }

    if (strlen($password) < 5) {
        echo '<h3 class="mensaje-error">¡La contraseña es muy corta!</h3>';
        exit;
    }

    if ($password != $password2) {
        echo '<h3 class="mensaje-error">¡La contraseña no coincide!</h3>';
        exit;
    }

    $consulta = "INSERT INTO empleados_$nomempresa(ID_empleado, nombre_empresa, usuario, contraseña, correo) VALUES ('$codempleado','$nomempresa','$usuario','$password','$correo')";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_affected_rows($conexion) > 0) {
        $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Registro exitoso, bienvenido ' . $nomempresa . '!</div>';
        header("Location: ../index.php");
        exit;
    } else {
        echo '<h3 class="mensaje-error">¡Ha ocurrido un error al registrar el usuario!</h3>';
        exit;
    }
}
?>
