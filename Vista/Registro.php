<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 24/1/17
 * Time: 13:02
 */

require_once "../Controlador/PaisBD.php";
require_once "../Modelo/Pais.php";

abstract class Registro
{


    public static function formularioRegistro()
    {
        Cabecera::mostrarCabecera("Subir foto");
        ?>
        <div class="container">
            <div class="text-center">
                <h1>Registro</h1>
                <h3>Por favor, introduce tus datos para registrarte</h3>
            </div>
            <form action="router.php" method="post" enctype="multipart/form-data">
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="usuario">Usuario: </label><input type="text" class="form-control" id="usuario" name="usuario"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                        <label for="pass">Contraseña: </label><input id="pass" class="form-control" type="password" name="contrasena"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="email">Email: </label><input type="text" class="form-control" name="email"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="fecha">Fecha </label><input type="date" name="fecha" id="fecha" class="form-control" min="1900-01-01" max="<?php echo date("Y-m-d");?>"><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="ciudad">Ciudad: </label><input type="text" id="ciudad" class="form-control" name="ciudad">
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                     <label for="pais">Pais: </label><select name="pais" class="form-control">
                        <?php
                        PaisBD::sacarPaises();
                        for ($x = 0; $x < count($_SESSION["paises"]); $x++) {
                            ?><option value ="<?php echo $_SESSION["paises"][$x]->getIdPais();?>"><?php echo $_SESSION["paises"][$x]->getNomPais();?></option ><?php
                        }
                     ?>
                    </select><br />
                </div>
                <div class="col-xs-12 col-xs-8 col-md-6">
                    <label for="foto">Foto: </label><input type="file" class="form-control" name="foto" accept="image/*"><br />
                </div>
                <div class="text-center" style="margin-top: 30px">
                    <input type="submit" class="btn btn-primary" name="registrar" value="Registrar">
                    <input type="submit" class="btn btn-default" name="cancelar1" value="Cancelar">
                </div>
            </form>
        </div>
        <?php
        Pie::mostrarPie();
    }

}
?>