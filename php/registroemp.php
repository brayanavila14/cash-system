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
        echo '<h3 class="mensaje-error">¡El usuario ' . $usuario . 'ya está registrado!</h3>';
        exit;
    }

    if (empty($nomempresa )) {
        echo '<h3 class="mensaje-error">¡Por favor ingresa el codigo de empresa!</h3>';
        exit;
    }

    if (empty($correo)) {
        echo '<h3 class="mensaje-error">¡Por favor ingresa el correo!</h3>';
        exit;
    }

    if (empty($usuario)) {
        echo '<h3 class="mensaje-error">¡Por favor ingresa el usuario!</h3>';
        exit;
    } elseif (strlen($usuario) < 3) {
        echo '<h3 class="mensaje-error">¡El usuario es muy corto!</h3>';
        exit;
    }

    if (empty($password)) {
        echo '<h3 class="mensaje-error">¡Por favor ingresa la contraseña!</h3>';
        exit;
    } elseif (strlen($password) < 5) {
        echo '<h3 class="mensaje-error">¡La contraseña es muy corta!</h3>';
        exit;
    }

    if ($password != $password2) {
        echo '<h3 class="mensaje-error">¡La contraseña no coincide!</h3>';
        exit;
    }

    $consultempresa = "SELECT nombre_empresa FROM administrador WHERE nombre_empresa ='$nomempresa'";
    $resulconsultempresa = mysqli_query($conexion, $consultempresa);
    
    if (mysqli_num_rows($resulconsultempresa) ==  0) {
        echo '<h3 class="mensaje-error">¡La empresa no existe, verifica el nombre!</h3>';
        exit;
    }

    $ingresempleado = "INSERT INTO empleados(ID_empleado, nombre_empresa, usuario, contraseña, email) VALUES ( '$codempleado' ,'$nomempresa ','$usuario','$password','$correo')";
    $resultempreado = mysqli_query($conexion, $ingresempleado);

    if ($resultempreado) {
        $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Registro con exito, bienvenido' . $name . '!</div>';
        header("Location: ../index.php");
        exit;
    } else {
        echo '<h3 class="mensaje-error">¡Ha ocurrido un error, por favor vuelve a intentarlo!</h3>';
        exit;
    }
}
?>