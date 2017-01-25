<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 24/1/17
 * Time: 12:54
 */

abstract class Login
{

    public static function formularioInicio()
    {
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <title>Login</title>
        </head>
        <body>
        <h1>Inicio de Sesión</h1>

        <h3>Bienvenido, por favor introduce tus datos o regístrate</h3>

        <form action="../Controlador/router.php" method="post">
            <p>Usuario: <input type="text" name="usuario"></p>

            <p>Contraseña: <input type="password" name="contrasena"></p>
            <input type="submit" name="enviar" value="Entrar">
            <input type="submit" name="registrarse" value="Registrarse">
        </form>
        </body>
        </html>
        <?php
    }

}
?>
