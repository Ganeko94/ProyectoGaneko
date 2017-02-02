<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 2/2/17
 * Time: 12:52
 */



class Inicio{

        public static function formularioInicio($texto = '', $ruta = 'Controlador/router.php', $ruta2 = 'Vista/CSS/style.css')
        {
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <title>Inicio</title>
                <link href="<?php echo $ruta2;?>" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            </head>
            <body>
            <h1>Inicio de Sesión</h1>

            <h3>Bienvenido, por favor introduce tus datos o regístrate</h3>
            <p class="error"><?php echo $texto;?></p>
            <div id="form">

                <form action="<?php echo $ruta;?>" method="post">
                    <p>Usuario: <input type="text" name="usuario"></p>

                    <p>Contraseña: <input type="password" name="contrasena"></p>
                    <p class="botones"><input type="submit" name="enviar" value="Entrar">
                    <input type="submit" name="registrarse" value="Registrarse"></p>
                </form>
            </div>
            </body>
            </html>
            <?php

        }
}
