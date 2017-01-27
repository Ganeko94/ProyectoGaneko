<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 27/1/17
 * Time: 13:02
 */

abstract class Views
{

    public static function misDatos()
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Registro</title>
        </head>
        <body>
        <h1>Datos Personales</h1>

        <h3>Estos son tus datos.</h3>



        <a href="../Principal.php">Haga click aquí para volver a la pagina principal.</a>
        </body>
        </html>
        <?php
    }

}
?>