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
        echo '<h3 class="mensaje-error">¡El usuario ' . $usuario . 'ya está registrado!</h3>';
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
    $consulta = "INSERT INTO administrador( ID, nombre_empresa, usuario, contraseña, email) VALUES ( '$cod','$name','$usuario','$password','$correo')";
    $resultado = mysqli_query($conexion, $consulta);
    
    // se verifica si el usuario se registro
    if ($resultado) {
        // crea las tablas correspondientes, empleado y inventario
        // se crea la tabla empleados
        $createtable = "CREATE TABLE empleados_$name(
            ID_empleado varchar(8) NOT NULL,
            nombre_empresa varchar (255) NOT NULL,
            usuario varchar (255) NOT NULL, 
            contraseña varchar (255) NOT NULL, 
            email varchar (255) NOT NULL, 
            PRIMARY KEY(ID_empleado), 
            FOREIGN KEY(nombre_empresa) REFERENCES administrador(ID) 
            );";
            
            // se crea la tabla empleados
            $resulttable = mysqli_query($conexion, $createtable);

            $createinventorio = "CREATE TABLE invetario_$name(
                
                codigo_producto varchar(8) NOT NULL,
                nombre_producto varchar (255) NOT NULL,
                precio_actual INT NOT NULL,
                cantidad_disponible INT (255) NOT NULL,
                email varchar (255) NOT NULL, PRIMARY KEY(ID_empleado),
                FOREIGN KEY(nombre_empresa) REFERENCES administrador(ID) );";
            $resultinventario = mysqli_query($conexion, $createinventorio);

            // se verifica si el usuario se registro
            if ($resultinventario) {
                $insertregist =  "INSERT INTO registro_tabla(Nombre_tablas) VALUES ('empleados_$name')";
                $resultregist =  mysqli_query($conexion, $insertregist);
            }
        header("Location: ../index.php");
        $_SESSION['mensaje'] = '<div class="mensaje-exito">¡Registro con exito, bienvenido' . $name . '!</div>';
        exit;
    } else {
        echo '<h3 class="mensaje-error">¡Ha ocurrido un error, por favor vuelve a intentarlo!</h3>';
        exit;
    }
}
?>
