<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 27/1/17
 * Time: 13:02
 */

require_once '../Modelo/Usuario.php';
require_once '../Vista/Plantilla/Cabecera.php';
require_once '../Vista/Plantilla/Pie.php';


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

        <h3>Estos son tus datos. Escribe alguno si quieres cambiar su valor.</h3>



        <form action="router.php" method="post">
            <p>Usuario: <input type="text" name="usuario" value="<?php $user = unserialize($_SESSION["usuario"]); echo $user->getNomusuario();?>"></p>
            <p>Contraseña: <input type="password" name="contrasena" value="<?php echo $user->getContrasena();?>"></p>
            <p>Email: <input type="text" name="email" value="<?php echo $user->getEmail();?>"></p>
            <p>Fecha <input type="date" name="fecha" min="1900-01-01" max="<?php echo date("Y-m-d");?>" value="<?php echo $user->getFnacimiento();?>"></p>
            <p>Ciudad: <input type="text" name="ciudad" value="<?php echo $user->getCiudad();?>"></p>
            <p>Pais: <select>
            <?php
                funciones::sacarPaises();
                for ($x = 0; $x < count($_SESSION["paises"]); $x++) {
                    if($_SESSION["paises"][$x]->getIdPais() == $user->getPais()){
                        ?><option value= "<?php echo $_SESSION["paises"][$x]->getIdPais();?>" selected="selected"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                    }
                    else{
                        ?><option value= "<?php echo $_SESSION["paises"][$x]->getIdPais();?>"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                    }
                }
            ?>
                </select></p>

            <p>Foto: <input type="text" name="foto" value="<?php echo $user->getFoto();?>"></p>

            <input type="submit" name="update" value="Guardar Cambios">
            <input type="submit" name="cancelar2" value="Cancelar">
        </form>
        </body>
        </html>
        <?php
    }

    public static function ventanaBaja(){
        ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <title>Login</title>
            </head>
            <body>
            <h1>Dar de baja</h1>

            <h3>¿Estás seguro que quieres darte de baja? Se cerrará la sesión y se borrará el usuario.</h3>

            <form action="router.php" method="post">
                <input type="submit" name="baja" value="Borrar">
                <input type="submit" name="cancelar2" value="Cancelar">
            </form>
            </body>
            </html>
        <?php
    }

}
?>