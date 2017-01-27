<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 13:22
 */

echo '<html><a href="../index.php">Pincha aquí para volver al inicio</a></html>';

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Principal</title>
</head>
<body>
<h1>Página Principal</h1>

<h3>Bienvenido, por favor selecciona que quieres hacer.</h3>
<form action="../Controlador/router.php" method="post">
    <input type="submit" name="datos" value="Mis datos">
    <input type="submit" name="baja" value="Darme de baja">
    <input type="submit" name="albumes" value="Mis álbumes">
    <input type="submit" name="nuevoalbum" value="Crear álbum">
    <input type="submit" name="nuevafoto" value="Añadir foto a álbum">
</form>
</body>
</html>
