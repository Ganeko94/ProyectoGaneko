<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 27/1/17
 * Time: 13:02
 */

require_once '../Modelo/Usuario.php';
require_once '../Modelo/Foto.php';
require_once '../Modelo/Album.php';
require_once '../Modelo/Pais.php';
require_once '../Controlador/AlbumBD.php';
require_once '../Controlador/FotoBD.php';
require_once '../Controlador/PaisBD.php';
require_once '../Controlador/UsuarioBD.php';
require_once '../Vista/Plantilla/Cabecera.php';
require_once '../Vista/Plantilla/Pie.php';


abstract class Views
{

    public static function misDatos()
    {

        Cabecera::mostrarCabecera("Mis datos");
        ?>
        <div class="container">
            <div class="text-center">
                <h1>Datos Personales</h1>

                <h3>Estos son tus datos. Escribe alguno si quieres cambiar su valor.</h3><br />
            </div>


            <form action="router.php" method="post" enctype="multipart/form-data">
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="usuario">Usuario:</label> <input type="text" id="usuario" name="usuario" class="form-control" value="<?php $user = unserialize($_SESSION["usuario"]); echo $user->getNomusuario();?>" disabled><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="pass">Contraseña: </label><input type="password" id="pass" class="form-control" name="contrasena" value="<?php echo $user->getContrasena();?>"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="email">Email: </label><input type="text" id="email" class="form-control" name="email" value="<?php echo $user->getEmail();?>"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="fecha">Fecha </label><input type="date" id="fecha" class="form-control" name="fecha" min="1900-01-01" max="<?php echo date("Y-m-d");?>" value="<?php echo $user->getFnacimiento();?>"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="ciudad">Ciudad</label><input type="text" id="ciudad" class="form-control" name="ciudad" value="<?php echo $user->getCiudad();?>"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="pais">Pais: </label><select name="pais" id="pais" class="form-control">
                <?php
                    PaisBD::sacarPaises();
                    for ($x = 0; $x < count($_SESSION["paises"]); $x++) {
                        if($_SESSION["paises"][$x]->getIdPais() == $user->getPais()){
                            ?><option value= "<?php echo $_SESSION["paises"][$x]->getIdPais();?>" selected="selected"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                        }
                        else{
                            ?><option value= "<?php echo $_SESSION["paises"][$x]->getIdPais();?>"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                        }
                    }
                ?>
                    </select><br />
                </div>
                <div class="col-xs-10 col-xs-6 col-md-4">
                    <label for="foto">Foto: </label><input type="file" name="foto" class="form-control" id="foto" accept="image/*" value="<?php echo $user->getFoto();?>">
                </div>
                <img width="200px" src="<?php echo $user->getFoto(); ?>">
                <div class="text-center" style="margin-top: 20px">
                    <input type="submit" class="btn btn-primary" name="update" value="Guardar Cambios">
                    <input type="submit" class="btn btn-default" name="cancelar2" value="Cancelar">
                </div>
            </form>
        </div>
        <?php
        Pie::mostrarPie();
    }

    public static function ventanaBaja(){
        Cabecera::mostrarCabecera("Baja");
        ?>
            <div class="container">
                <div class="text-center">
                    <h1>Dar de baja</h1>

                    <h3>¿Estás seguro que quieres darte de baja?<br /> Se cerrará la sesión y se borrará el usuario.</h3>
                    <br />
                    <form action="router.php" method="post">
                        <input type="submit" class="btn btn-danger" name="baja" value="Borrar">
                        <input type="submit" class="btn btn-default" name="cancelar2" value="Cancelar">
                    </form>
                </div>
            </div>
        <?php
        Pie::mostrarPie();
    }

    public static function crearAlbum()
    {
        Cabecera::mostrarCabecera("Crear Album");
        ?>
        <div class="container">
            <div class="text-center">
                <h1>Crea un nuevo Album</h1>
                <h3>Rellena los datos sobre el Album.</h3>
            </div>


            <form action="router.php" method="post">
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="titulo">Titulo: </label><input type="text" class="form-control"  id="titulo" name="titulo"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="descripcion">Descripcion: </label> <input type="text" class="form-control"  id="descripcion" name="descripcion"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="fecha">Fecha: </label> <input type="date" name="fecha" class="form-control"  min="1900-01-01" max="<?php echo date("Y-m-d");?>"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                <label for="pais">Pais: </label><select name="pais" id="pais" class="form-control"><br />
                        <?php
                        PaisBD::sacarPaises();
                        for ($x = 0; $x < count($_SESSION["paises"]); $x++) {
                            ?><option value= "<?php echo $_SESSION["paises"][$x]->getIdPais();?>"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                        }
                        ?>
                    </select><br />
                </div>
                <div class="text-center" style="margin-top: 30px">
                    <input type="submit" class="btn btn-primary"  name="nuevoalbum" value="Crear">
                    <input type="submit" class="btn btn-default"  name="cancelar2" value="Cancelar">
                </div>
            </form>
        </div>
        <?php
        Pie::mostrarPie();
    }

    public static function misAlbumes()
    {
        Cabecera::mostrarCabecera("Mis álbumes");
        ?>
        <div class="container">
            <div class="text-center">
                <h1>Listado de álbumes</h1>
             </div>

            <?php
            AlbumBD::sacarAlbumes();
            if($_SESSION["albumes"] == null){
                echo '<div class="alert alert-danger text-center" role="alert"><p>No hay albumes de este usuario</p></div>';
            }
            else{
                echo '<div class="text-center"><h3>Selecciona el Álbum que quieres ver.</h3></div>';
                echo "<table class='table' border='1'><tr class=\"success\"><th>Album</th><th>Fecha</th><th>Descripcion</th><th>Ver album</th></tr>";
                for ($x = 0; $x < count($_SESSION["albumes"]); $x++) {
                    echo "<form action='router.php' method='post'>";
                    ?><tr class="warning"><td><?php echo $_SESSION["albumes"][$x]->getTitulo();?></td><td><?php echo $_SESSION["albumes"][$x]->getFecha();?></td><td><?php echo $_SESSION["albumes"][$x]->getDescripcion();?></td><td><input type="submit" class="btn btn-success" name="veralbum" value="Ver Album"><input type="hidden" name="album" <?php echo "value='".$_SESSION["albumes"][$x]->getIdAlbum()."'";?>"></td></tr><?php
                    echo "</form>";
                }
                echo "</table>";
            }

            ?>
            <br/>
            <form action="router.php" method="post">
                <input type="submit" class="btn btn-info" name="cancelar2" value="Volver">
            </form>
        </div>
        <?php
        Pie::mostrarPie();
    }

    public static function vistaAlbum(){
        Cabecera::mostrarCabecera("Album");
        ?>
        <div class="container">
            <div class="text-center">
                <h1>Vista de álbum</h1>
            </div>
            <?php $album = unserialize($_SESSION["album"]);?>
            <p>Titulo: <?php echo $album->getTitulo();?></p>
            <p>Descripcion: <?php echo $album->getDescripcion();?></p>
            <p>Fecha: <?php echo $album->getFecha();?></p>
            <p>Pais: <?php echo $album->getPais();?></p>
            <?php FotoBD::sacarFotos();
                if(count($_SESSION["fotos"]) < 1){
                    echo '<div class="alert alert-danger text-center" role="alert"><p>Este album aún no tiene fotos</p></div>';
                }else{
                    for ($x = 0; $x < count($_SESSION["fotos"]); $x++) {
                        ?><img height="250px" src="<?php echo $_SESSION["fotos"][$x]->getFichero();?>"><?php
                    }
                }
            ?>
            <div class="text-center" style="margin-top: 30px">
                <form action="router.php" method="post" enctype="multipart/form-data">
                    <input type="submit" name="cancelar2" class="btn btn-primary" value="Salir">
                </form>
            </div>
        </div>
        <?php
        Pie::mostrarPie();
    }

    public static function busquedaFotos(){
        Cabecera::mostrarCabecera("Busqueda Fotos");
        ?>
        <div class="container">
            <div class="text-center">
                <h1>Listado de fotos buscadas</h1>
            </div>

                <?php
                FotoBD::buscarFotos();
                if($_SESSION["busqueda"] == null){
                    echo '<div class="alert alert-danger text-center" role="alert"><p>No hay fotos que coincidan</p></div>';
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
                    <input type="submit" class="btn btn-primary" name="cancelar1" value="Volver">
                </form>
        </div>
        <?php
        Pie::mostrarPie();
    }

    public static function subidaFoto(){
        Cabecera::mostrarCabecera("Subir foto");
        ?>
        <div class="container">
            <div class="text-center">
                <h1>Subir foto</h1>
                <h3>Selecciona el album al que quieres subir la foto</h3>
            </div>
                <form action="router.php" method="post" enctype="multipart/form-data">
                    <?php
                    AlbumBD::sacarAlbumes();
                    if($_SESSION["albumes"] == null){
                        echo '<div class="alert alert-danger text-center" role="alert">No hay albumes de este usuario</div>';
                    }
                    else{
                    ?>
                    <div class="col-xs-12 col-xs-8 col-md-6">
                        <label for="titulo">Titulo de la foto: </label><input type="text" class="form-control" id="titulo" name="titulo">
                    </div>
                    <div class="col-xs-12 col-xs-8 col-md-6">
                        <label for="fecha">Fecha: </label> <input type="date" class="form-control" id="fecha" name="fecha" min="1900-01-01" max="<?php echo date("Y-m-d");?>"><br />
                    </div>
                    <div class="col-xs-12 col-xs-8 col-md-6"
                    <label for="album">Album: </label><select name="album" class="form-control">

                    <?php

                        for ($x = 0; $x < count($_SESSION["albumes"]); $x++) {

                            ?>
                            <option value="<?php echo $_SESSION["albumes"][$x]->getIdalbum();?>"><?php echo $_SESSION["albumes"][$x]->getTitulo();?></option>
                            <?php

                        }

                    ?>
                    </select><br />
                    </div>
                    <div class="col-xs-12 col-xs-8 col-md-6">
                        <label for="pais">Pais: </label><select name="pais" id="pais" class="form-control">
                    <?php
                    PaisBD::sacarPaises();
                        for ($x = 0; $x < count($_SESSION["paises"]); $x++) {
                            ?><option value ="<?php echo $_SESSION["paises"][$x]->getIdPais();?>"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                        }
                    ?>
                    </select><br />
                    </div>

                    <div class="col-xs-12 col-xs-8 col-md-6">
                        <label for="foto">Foto: </label><input type="file" name="foto" id="foto" class="form-control" accept="image/*">
                    </div>
                    <div class="col-xs-12 col-xs-8 col-md-6 text-center" style="margin-top: 25px">
                        <input type="submit" name="anadirfoto" class="btn btn-primary" value="Añadir Foto">
                        <?php } ?>
                        <input type="submit" name="cancelar2" class="btn btn-default" value="Salir">
                    </div>
                    </form>
        </div>
        <?php
        Pie::mostrarPie();
    }

}
?>