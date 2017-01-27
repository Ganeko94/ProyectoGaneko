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

        <form action="router.php" method="post">
            <p>Usuario: <input type="text" name="usuario"></p>
            <p>Contraseña: <input type="password" name="contrasena"></p>
            <p>Email: <input type="text" name="email"></p>
            <p>Fecha <input type="date" name="fecha"></p>
            <p>Ciudad: <input type="text" name="ciudad"></p>
            <p>Pais: <select>
                    <?php
                    funciones::sacarPaises();
                    for ($x = 0; $x < count($_SESSION["paises"]); $x++) {
                        ?><option value = "<?php echo $_SESSION["paises"][$x]->getIdPais();?>"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                    }
                    ?>
                </select></p>

            <p>Foto: <input type="text" name="foto"></p>

            <input type="submit" name="update" value="Guardar Cambios">
            <input type="submit" name="cancelar" value="Cancelar">
        </form>

        <a href="../Principal.php">Haga click aquí para volver a la pagina principal.</a>
        </body>
        </html>
        <?php
    }

}
?>