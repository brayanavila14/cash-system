<?php 

    include("base-de-datos.php");

    if (isset($_POST['aceptar'])) {

        $contraactual = trim($_POST['contraactual']);
        $newcontra = trim($_POST['newcontra']);   
        $verificacion = trim($_POST['verificacion']);  
        $consultacontra1 = "SELECT Contraseña FROM adminstrador WHERE Contraseña = '$contraactual'";
        $consultacontra2 = "SELECT Contraseña FROM empleado WHERE Contraseña = '$contraactual'";
        $resultadocontra1 = mysqli_fetch_assoc(mysqli_query($conexion, $consultacontra1));
        $resultadocontra2 = mysqli_fetch_assoc(mysqli_query($conexion, $consultacontra2));

        if (strlen($contraactual) == 0 && strlen($newcontra) == 0 && strlen($verificacion) == 0) {
            ?>
            <h3 class="advert">¡no has escrito nada!</h3>
            <?php
            return;
        }   else {
                if (strlen($contraactual) == 0) {
                    ?>
                    <h3 class="advert name">¡Por favor ingresa la contraseña!</h3>;
                    <?php
                return;
                } else {
                    if (strlen($newcontra) == 0) {
                        ?>
                        <h3 class="advert email">¡Por favor ingresa la nueva contraseña!</h3>;
                        <?php
                    return;
                    } else {
                        if (strlen($verificacion) == 0) {
                            ?>
                            <h3 class="advert usuario">¡Por favor verifica tu contraseña!</h3>;
                            <?php
                        return;
                        } else {
                            if ($contraactual != $verificacion ) {
                                ?>
                                <h3 class="advert usuario">¡La contraseña no coincide, vuelve a intentarlo!</h3>;
                                <?php 
                            return; 
                            
                            }
                        }
                    }
                }
            }   
        }   
?>