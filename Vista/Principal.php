<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 13:22
 */

session_start();
require_once '../Modelo/Usuario.php';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Principal</title>
    <link href="CSS/login.css" rel="stylesheet" type="text/css">
    <link href="CSS/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
</head>
<body>
<h1>Página Principal</h1>

<h3>Bienvenido <?php $user = unserialize($_SESSION["usuario"]); echo $user->getNomusuario();?>, por favor selecciona que quieres hacer.</h3>
<div id="botones">
    <form action="../Controlador/router.php" method="post">
        <p><input type="submit" class="btn btn-info" name="datos" value="Mis datos">
        <input type="submit" class="btn btn-danger" name="baja" value="Darme de baja">
        <input type="submit" class="btn btn-info" name="albumes" value="Mis álbumes">
        <input type="submit" class="btn btn-success" name="nuevoalbum" value="Crear álbum">
        <input type="submit" class="btn btn-success" name="nuevafoto" value="Añadir foto a álbum">
        <input type="submit" class="btn btn-warning" name="cerrarsesion" value="Cerrar Sesión"></p>
    </form>
</div>
</body>
</html>
