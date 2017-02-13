<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 2/2/17
 * Time: 12:52
 */

require_once '../Controlador/FotoBD.php';
require_once '../Vista/Plantilla/Pie.php';

class Inicio{

        public static function formularioInicio($texto = '', $ruta = '../Controlador/router.php', $ruta2 = 'CSS/')
        {
            ?>
            <!DOCTYPE html>
            <html lang="es">
            <head>
                <meta charset="UTF-8">
                <title>Inicio</title>
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                <link href="<?php echo $ruta2.'bootstrap/css/bootstrap.min.css';?>" rel="stylesheet" type="text/css">
                <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            </head>
            <body>
            <div class="container">
                <div class="row">
                    <h1 style="text-align: center">Inicio de Sesión</h1>

                    <h3 style="text-align: center">Bienvenido, por favor introduce tus datos o regístrate</h3>

                    <?php echo $texto;?>

                    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-lg-6 col-lg-offset-3 well">
                        <form class="form-horizontal " action="<?php echo $ruta;?>" method="post">
                            <div class="form-group">
                                <label for="usuario" class="col-sm-2 control-label">Usuario: </label>
                                <div class="col-sm-10">
                                    <input type="text" name="usuario" class="form-control" id="usuario" placeholder="Usuario">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contrasena" class="col-sm-2 control-label">Contraseña: </label>
                                <div class="col-sm-10">
                                    <input type="password" name="contrasena" class="form-control" id="contrasena" placeholder="Contraseña">
                                </div>
                                <div class="form-group">
                                    <div class="col-xs-offset-4 col-xs-6" style="margin-top: 10px">
                                        <input type="submit" name="entrar" class="btn btn-primary" value="Entrar">
                                        <input type="submit" name="registrarse" class="btn btn-default" value="Registrarse">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-lg-6 col-lg-offset-3 well">
                    <form class="form-horizontal" action="<?php echo $ruta;?>" method="post">
                        <div class="form-group">
                            <label for="titulo" class="col-sm-2 control-label">Busqueda: </label>
                            <div class="col-sm-10">
                                <input type="text" name="titulo" class="form-control" id="titulo" placeholder="Fotos a buscar"><br />
                            </div>
                            <div class="text-center">
                                <br />
                                <input type="submit" name="buscarfoto" class="btn btn-primary" value="Buscar">
                            </div>
                        </div>
                    </form>
                    </div>

                    <div class="container fotos">
                        <div class="well col-xs-10 col-xs-offset-1 col-sm-10 col-sm-offset-1 col-lg-10 col-lg-offset-1">
                            <div class="text-center">
                                <h2>Ultimas fotos subidas</h2>
                            </div>
                            <?php
                            FotoBD::sacarUltimasFotos();
                            for($x = 0; $x < count($_SESSION["ultimas"]); $x++){
                                ?><img height="150px" src="<?php echo $_SESSION["ultimas"][$x]->getFichero();?>"><?php
                            }
                            ?>
                        </div>

                    </div>
                </div>
            </div>
            <?php
            Pie::mostrarPie();
        }
}
