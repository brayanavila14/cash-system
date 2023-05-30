<?php
include("base-de-datos.php");

if (isset($_POST['registra'])) {
    // se guardan los datos correspondientes en cada variable
    $cod = trim($_POST['cod']);
    $name = trim($_POST['nom-empresa']);
    $usuario = trim($_POST['usuario']);
    $password = trim($_POST['contraseña']);
    $password2 = trim($_POST['contraseña2']);
    $correo = trim($_POST['correo']);

    // Verificar si el usuario ya está registrado
    $consulta = "SELECT * FROM administrador WHERE usuario = '$usuario'";
    $resultado = mysqli_query($conexion, $consulta);

    if (mysqli_num_rows($resultado) > 0) {
        echo '<h3 class="mensaje-error">¡El usuario ' . $usuario . ' ya está registrado!</h3>';
        exit;
    }

    if (empty($name)) {
        echo '<h3 class="mensaje-error">¡Por favor ingresa el nombre de la empresa!</h3>';
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

    // inserta los datos a la tabla administrador
    $consulta = "INSERT INTO administrador(ID, nombre_empresa, usuario, contraseña, email) VALUES ('$cod','$name','$usuario','$password','$correo')";
    $resultado = mysqli_query($conexion, $consulta);

    // se verifica si el usuario se registró correctamente
    if ($resultado) {
       // Sentencia para crear la tabla empleados
    $createTableEmpleados = "CREATE TABLE $name (
    ID_empleado varchar(8) NOT NULL,
    nombre_empresa varchar(255) NOT NULL,
    usuario varchar(255) NOT NULL,
    contrasena varchar(255) NOT NULL,
    email varchar(255) NOT NULL,
    PRIMARY KEY(ID_empleado),
    FOREIGN KEY(nombre_empresa) REFERENCES administrador(ID)
    );";

    $resultEmpleados = mysqli_query($conexion, $createTableEmpleados);

    // Sentencia para crear la tabla inventario
    $createTableInventario = "CREATE TABLE inventario-$name (
    codigo_producto varchar(8) NOT NULL,
    nombre_producto varchar(255) NOT NULL,
    precio_actual INT NOT NULL,
    cantidad_disponible INT NOT NULL,
    PRIMARY KEY(codigo_producto)
    );";
    $resultInventario = mysqli_query($conexion, $createTableInventario);

    // inserta los datos a la tabla administrador
    $consultnomtable = "INSERT INTO registro_tabla(Nombre_tablas) VALUES ('empleado_$name')";
    $resultnomtable = mysqli_query($conexion, $consultnomtable);


        // se verifica si las tablas se crearon correctamente
        if ($resultEmpleados && $resultInventario && $resultnomtable) {
            
            $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Registro exitoso, bienvenido ' . $name . '!</div>';
            // se redirige al usuario a la página de inicio
            header("Location: ../index.php");
            exit;
        } else {
            echo '<h3 class="mensaje-error">¡Ha ocurrido un error al crear las tablas!</h3>';
            exit;
        }
    } else {
        echo '<h3 class="mensaje-error">¡Ha ocurrido un error al registrar el usuario!</h3>';
        exit;
    }
}
?>

