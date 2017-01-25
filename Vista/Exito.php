<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 24/1/17
 * Time: 13:53
 */

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

            <a href="../index.php">Haga click aquí para volver a la pagina principal.</a>

            </body>
            </html>
            <?php
        }

    }
?>
