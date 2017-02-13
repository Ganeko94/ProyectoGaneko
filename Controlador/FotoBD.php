<?php
/**
 * Created by PhpStorm.
 * User: ganek
 * Date: 13/02/2017
 * Time: 21:23
 */
class FotoBD{


    public static function subirFoto()
    {

        require_once '../Modelo/Foto.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $titulo = $_POST["titulo"];
        $fecha = $_POST["fecha"];
        $pais = $_POST["pais"];
        $album = $_POST["album"];

        $archivoFoto = $_FILES['foto']['tmp_name'];
        $destinoFoto = "../Fotos/" . $_FILES['foto']['name'];
        move_uploaded_file($archivoFoto, $destinoFoto);

        $foto = new Foto($titulo, $fecha, $pais, $album, $destinoFoto);

        $consulta = "INSERT INTO Foto (Titulo, Fecha, Pais, Album, Fichero) VALUES ('" . $foto->getTitulo() . "', '" . $foto->getFecha() . "', '" . $foto->getPais() . "', '" . $foto->getAlbum() . "', '" . $foto->getFichero() . "')";

        mysqli_query($conexion, $consulta);

        desconectar($conexion);

    }

    public static function buscarFotos()
    {

        require_once '../Modelo/Foto.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $titulo = $_POST["titulo"];

        $consulta = "SELECT * FROM Foto WHERE Titulo LIKE '%" . $titulo . "%'";
        $resultado = mysqli_query($conexion, $consulta);
        $fila = mysqli_fetch_object($resultado);
        $busqueda = [];
        while ($fila != null) {
            $foto = new Foto($fila->Titulo, $fila->Fecha, $fila->Pais, $fila->Album, $fila->Fichero);
            array_push($busqueda, $foto);
            $fila = mysqli_fetch_object($resultado);
        }
        $_SESSION["busqueda"] = $busqueda;
        desconectar($conexion);
    }

    public static function sacarFotos()
    {

        require_once '../Modelo/Foto.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $album = unserialize($_SESSION["album"]);

        $consulta = "SELECT * FROM Foto WHERE Album = '" . $album->getIdalbum() . "'";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);

        $fotos = [];

        while ($fila != null) {
            $foto = new Foto($fila->Titulo, $fila->Fecha, $fila->Pais, $fila->Album, $fila->Fichero);
            array_push($fotos, $foto);
            $fila = mysqli_fetch_object($resultado);
        }
        $_SESSION["fotos"] = $fotos;

        desconectar($conexion);

    }

    public static function sacarUltimasFotos()
    {

        require_once '../Modelo/Foto.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $consulta = "SELECT * FROM Foto ORDER BY FRegistro DESC LIMIT 5";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);

        $fotos = [];

        while ($fila != null) {
            $foto = new Foto($fila->Titulo, $fila->Fecha, $fila->Pais, $fila->Album, $fila->Fichero);
            array_push($fotos, $foto);
            $fila = mysqli_fetch_object($resultado);
        }
        $_SESSION["ultimas"] = $fotos;

        desconectar($conexion);

    }


}