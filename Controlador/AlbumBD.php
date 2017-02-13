<?php
/**
 * Created by PhpStorm.
 * User: ganek
 * Date: 13/02/2017
 * Time: 21:23
 */

class AlbumBD{

    public static function nuevoAlbum()
    {

        try {
            require_once '../Modelo/Album.php';
            require_once '../Modelo/Usuario.php';
            require_once '../Modelo/GenericoBD.php';

            $conexion = conectar();

            $titulo = $_POST["titulo"];
            $descripcion = $_POST["descripcion"];
            $fecha = $_POST["fecha"];
            $pais = $_POST["pais"];

            $user = unserialize($_SESSION["usuario"]);

            $nombre = $user->getNomusuario();

            $album = new Album($titulo, $descripcion, $fecha, $pais, $nombre);

            $consulta = "INSERT INTO Album (Titulo, Descripcion, Fecha, Pais, Usuario) VALUES ('" . $album->getTitulo() . "', '" . $album->getDescripcion() . "', '" . $album->getFecha() . "', '" . $album->getPais() . "', '" . $album->getUsuario() . "')";

            mysqli_query($conexion, $consulta);

            desconectar($conexion);
        } catch (Exception $e) {
            echo $e;
        }

    }

    public static function buscarAlbum()
    {

        require_once '../Modelo/Album.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $id = $_POST["album"];

        $consulta = "SELECT * FROM Album WHERE IdAlbum ='" . $id . "'";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado->num_rows != 0) {
            $fila = mysqli_fetch_object($resultado);

            /* Creo el objeto album, para pasarlo a session */

            $album = new Album($fila->Titulo, $fila->Descripcion, $fila->Fecha, $fila->Pais, $fila->Usuario);
            $album->setIdalbum($fila->IdAlbum);
            //session_start();

            $_SESSION["album"] = serialize($album);
            desconectar($conexion);
            return true;

        } else {
            desconectar($conexion);
            return false;
        }


    }

    public static function sacarAlbumes()
    {

        require_once '../Modelo/Album.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $user = unserialize($_SESSION["usuario"]);

        $consulta = "SELECT * FROM Album WHERE Usuario = '" . $user->getNomusuario() . "'";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);

        $albumes = [];

        while ($fila != null) {
            $album = new Album($fila->Titulo, $fila->Descripcion, $fila->Fecha, $fila->Pais, $fila->Usuario);
            $album->setIdalbum($fila->IdAlbum);
            array_push($albumes, $album);
            $fila = mysqli_fetch_object($resultado);
        }
        $_SESSION["albumes"] = $albumes;

        desconectar($conexion);

    }

}