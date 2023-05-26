<?php 
include("base-de-datos.php");

if (isset($_POST['registra'])) {

    $codempleado = trim($_POST['cod-empresa']);
    $usuario = trim($_POST['usuario']);   
    $password = trim($_POST['contraseña']);  
    $password2 = trim($_POST['contraseña2']); 
    $correo = trim($_POST['correo']);    
    
    if ( strlen($codempleado) == 0 && strlen($usuario) == 0 && strlen($password) == 0 &&
    strlen($password2)== 0 && strlen($correo) == 0) {
        ?>
        <h3 class="advert">¡no has escrito nada!</h3>
        <?php
        return;
    } else {
        if ( strlen($codempleado) == 0 || strlen($usuario) == 0 || strlen($password) == 0 ||
        strlen($password2)== 0 || strlen($correo) == 0) {
            ?>
            <h3 class="advert">¡Por favor completa todos los campos!</h3>
            <?php
          return;
        } else {
            if (strlen($codempleado) == 0) {
                ?>
                <h3 class="advert name">¡Por favor ingresa el codigo de la empresa!</h3>;
                <?php
            return;
            } else {
                if (strlen($correo) == 0) {
                    ?>
                    <h3 class="advert email">¡Por favor ingresa el correo!</h3>;
                    <?php
                    return;
                } else {
                    if (strlen($usuario) == 0) {
                        ?>
                        <h3 class="advert usuario">¡Por favor ingresa el usuario!</h3>;
                        <?php
                    return;
                    } else {
                        if (strlen($usuario < 3)) {
                            ?>
                            <h3 class="advert usuario">¡El usuario es muy corto!</h3>;
                            <?php
                        return;  
                        } else {
                            if (strlen($password) == 0) {
                                ?>
                                <h3 class="advert password">¡Por favor ingresa la contraseña!</h3>;
                                <?php
                            return;
                            } else {
                                if (strlen($password) < 5) {
                                    ?>
                                    <h3 class="advert password">¡La contraseña es muy corta!</h3>;
                                    <?php
                                return; 
                                } else {
                                    if ($password != $password2) {
                                        ?>
                                        <h3 class="advert password2">¡La contraseña no coincide!</h3>;
                                        <?php
                                        return;
                                    } else {
                                        if (strlen($codempleado) >= 1 && strlen($usuario) >= 1 && strlen($correo) >= 1 &&
                                        strlen($password) >= 1 && strlen($password) == strlen($password2)) {
                                                
                                            $consultacod = "SELECT `Cod` FROM `administrador` WHERE Cod='$codempleado'";
                                            $resultadoconsult = mysqli_fetch_assoc(mysqli_query($conexion, $consultacod));
                                    
                                            if ( $codempleado != $resultadoconsult['Cod']) {
                                                ?>
                                                <h3 class="advert name">¡Este codigo no existe, por favor verifique el codigo!</h3>;
                                                <?php
                                            return;
                                            } 
                                            $consulta = "INSERT INTO empleado(cod_empresa, Nombre, Contraseña, Correo) VALUES ('$codempleado', '$usuario', '$password', '$correo')" ;
                                            $resultado = mysqli_query($conexion, $consulta );
                                            
                                            if ($resultado) {
                                                
                                                header("Location: login.php");
                    
                                            } else {
                                                ?>
                                                <h3 class="mensaje malo">¡A ocurrido un error vuelve a intentarlo!</h3>;
                                                <?php
                                            }

                                        }

                                    }

                                }

                            }

                        }

                    }

                }

            }

        }

    }

}
?>