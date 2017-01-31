<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 24/1/17
 * Time: 13:53
 */

    session_start();

    abstract class Exito
    {


        public static function mensajeExito()
        {
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <title>Registro</title>
            </head>
            <body>
            <h1>Registro exitoso</h1>

            <h3>Se ha registrado en nuestra Web perfectamente.</h3>

            <h3>Tus datos son:</h3>
            <p>Usuario: <strong><?php $user = unserialize($_SESSION["usuario"]); echo $user->getNomusuario(); ?></strong></p>
            <p>Contraseña: <strong><?php echo $user->getContrasena(); ?></strong></p>

            <a href="../Vista/Principal.php">Haga click aquí para ir a su página principal.</a>

            </body>
            </html>
            <?php
        }

    }
?>
