<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 2/2/17
 * Time: 12:52
 */

require_once 'Vista/Plantilla/Cabecera.php';
require_once 'Vista/Plantilla/Pie.php';

class Inicio{

        public static function formularioInicio()
        {
            Cabecera::mostrarCabecera("Formulario Inicio");
            ?>
            <body>
            <h1>Inicio de Sesión</h1>

            <h3>Bienvenido, por favor introduce tus datos o regístrate</h3>

            <form action="Controlador/router.php" method="post">
                <p>Usuario: <input type="text" name="usuario"></p>

                <p>Contraseña: <input type="password" name="contrasena"></p>
                <input type="submit" name="enviar" value="Entrar">
                <input type="submit" name="registrarse" value="Registrarse">
            </form>
            <?php
            Pie::mostrarPie();
        }
}
