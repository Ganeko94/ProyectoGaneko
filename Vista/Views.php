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
        Cabecera::mostrarCabecera("Mis datos");
        ?>
        <body>
        <h1>Datos Personales</h1>

        <h3>Estos son tus datos. Escribe alguno si quieres cambiar su valor.</h3>



        <form action="router.php" method="post" enctype="multipart/form-data">
            <p>Usuario: <input type="text" name="usuario" value="<?php $user = unserialize($_SESSION["usuario"]); echo $user->getNomusuario();?>" disabled></p>
            <p>Contraseña: <input type="password" name="contrasena" value="<?php echo $user->getContrasena();?>"></p>
            <p>Email: <input type="text" name="email" value="<?php echo $user->getEmail();?>"></p>
            <p>Fecha <input type="date" name="fecha" min="1900-01-01" max="<?php echo date("Y-m-d");?>" value="<?php echo $user->getFnacimiento();?>"></p>
            <p>Ciudad: <input type="text" name="ciudad" value="<?php echo $user->getCiudad();?>"></p>
            <p>Pais: <select name="pais">
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
            <p><img width="200px" src="<?php echo $user->getFoto(); ?>"></p>
            <p>Foto: <input type="file" name="foto" accept="image/*" value="<?php echo $user->getFoto();?>"></p>

            <input type="submit" name="update" value="Guardar Cambios">
            <input type="submit" name="cancelar2" value="Cancelar">
        </form>
        </body>
        </html>
        <?php
    }

    public static function ventanaBaja(){
        Cabecera::mostrarCabecera("Baja");
        ?>
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

    public static function crearAlbum()
    {
        Cabecera::mostrarCabecera("Crear Album");
        ?>
        <body>
        <h1>Crea un nuevo Album</h1>

        <h3>Rellena los datos sobre el Album.</h3>

        <form action="router.php" method="post">
            <label for="titulo">Titulo: </label><input type="text" name="titulo">
            <label for="descripcion">Descripcion: </label> <input type="text" name="descripcion">
            <label for="fecha">Fecha: </label> <input type="date" name="fecha" min="1900-01-01" max="<?php echo date("Y-m-d");?>"></p>
            <label for="pais">Pais: </label><select name="pais">
                    <?php
                    funciones::sacarPaises();
                    for ($x = 0; $x < count($_SESSION["paises"]); $x++) {
                        ?><option value= "<?php echo $_SESSION["paises"][$x]->getIdPais();?>"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                    }
                    ?>
                </select>

            <input type="submit" name="nuevoalbum" value="Crear">
            <input type="submit" name="cancelar2" value="Cancelar">
        </form>
        </body>
        </html>
        <?php
    }

    public static function misAlbumes()
    {
        Cabecera::mostrarCabecera("Mis álbumes");
        ?>
        <body>
        <h1>Listado de álbumes</h1>


            <?php
            funciones::sacarAlbumes();
            if($_SESSION["albumes"] == null){
                echo "No hay albumes de este usuario";
            }
            else{
                echo '<h3>Selecciona el Álbum que quieres ver.</h3>';
                echo "<form action='router.php' method='post'><table class='table' border='1'><tr><th>Album</th><th>Fecha</th><th>Descripcion</th><th>Ver album</th></tr>";
                for ($x = 0; $x < count($_SESSION["albumes"]); $x++) {
                    ?><tr><td><?php echo $_SESSION["albumes"][$x]->getTitulo();?></td><td><?php echo $_SESSION["albumes"][$x]->getFecha();?></td><td><?php echo $_SESSION["albumes"][$x]->getDescripcion();?></td><td><input type="submit" name="veralbum" value="Ver Album"><input type="hidden" name="album" value="<?php echo $_SESSION["albumes"][$x]->getIdalbum();?>" </td></tr><?php
                }
                echo "</table></form>";
            }

            ?>
            </table>
            <br/>
            <form action="router.php" method="post">
                <input type="submit" name="cancelar2" value="Volver">
            </form>

        </body>
        </html>
        <?php
    }

    public static function vistaAlbum(){
        Cabecera::mostrarCabecera("Album");
        ?>
        <body>
        <h1>Vista de álbum</h1>

        <?php $album = unserialize($_SESSION["album"]);?>
        <p>Titulo: <?php echo $album->getTitulo();?></p>
        <p>Descripcion: <?php echo $album->getDescripcion();?></p>
        <p>Fecha: <?php echo $album->getFecha();?></p>
        <p>Pais: <?php echo $album->getPais();?></p>
        <?php funciones::sacarFotos();
            for ($x = 0; $x < count($_SESSION["fotos"]); $x++) {
                ?><img height="350px" src="<?php echo $_SESSION["fotos"][$x]->getFichero();?>"><?php
            }
        ?>
        <form action="router.php" method="post" enctype="multipart/form-data">
            <input type="submit" name="cancelar2" value="Salir">
        </form>
        </body>
        </html>
        <?php
    }

    public static function busquedaFotos(){
        Cabecera::mostrarCabecera("Busqueda Fotos");
        ?>
        <body>
        <h1>Listado de fotos buscadas</h1>


        <?php
        funciones::buscarFotos();
        if($_SESSION["busqueda"] == null){
            echo "No hay fotos que coincidan";
        }
        else{
            echo "<table class='table' border='1'><tr><th>Titulo</th><th>Fecha</th><th>Foto</th></tr>";
            for ($x = 0; $x < count($_SESSION["busqueda"]); $x++) {
                ?><tr><td><?php echo $_SESSION["busqueda"][$x]->getTitulo();?></td><td><?php echo $_SESSION["busqueda"][$x]->getFecha();?></td><td><img height="250px" src="<?php echo $_SESSION["busqueda"][$x]->getFichero();?>"></td></tr><?php
            }
            echo "</table></form>";
        }

        ?>
        </table>
        <br/>
        <form action="router.php" method="post">
            <input type="submit" name="cancelar2" value="Volver">
        </form>

        </body>
        </html>
        <?php
    }

    public static function subidaFoto(){
        Cabecera::mostrarCabecera("Subir foto");
        ?>
        <body>
        <h1>Subir foto</h1>
        <h3>Selecciona el album al que quieres subir la foto</h3>
        <form action="router.php" method="post" enctype="multipart/form-data">
            <p>Titulo de la foto: <input type="text" name="titulo"></p>
            <p>Fecha <input type="date" name="fecha" min="1900-01-01" max="<?php echo date("Y-m-d");?>"></p>
            <p>Album: <select name="album">
            <?php
            funciones::sacarAlbumes();
            if($_SESSION["albumes"] == null){
                    echo "No hay albumes de este usuario";
            }
            else
            {
                for ($x = 0; $x < count($_SESSION["albumes"]); $x++) {

                    ?>
                    <option value="<?php echo $_SESSION["albumes"][$x]->getIdalbum();?>"><?php echo $_SESSION["albumes"][$x]->getTitulo();?></option>
                    <?php

                }

            }

            ?>
            </select></p>
            <p>Pais: <select name="pais">
            <?php
            funciones::sacarPaises();
                for ($x = 0; $x < count($_SESSION["paises"]); $x++) {
                    ?><option value ="<?php echo $_SESSION["paises"][$x]->getIdPais();?>"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                }
            ?>
            </select></p>

            <p>Foto: <input type="file" name="foto" accept="image/*"></p>
            <input type="submit" name="anadirfoto" value="Añadir Foto">
            <input type="submit" name="cancelar2" value="Salir">
        </form>
        </body>
        </html>
        <?php
    }

}
?>