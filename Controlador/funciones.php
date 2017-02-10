<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 27/1/17
 * Time: 12:34
 */

require_once '../Modelo/GenericoBD.php';

class funciones{

    public static function sacarPaises(){

        require_once '../Modelo/Pais.php';

        $conexion = conectar();

        $consulta = "SELECT * FROM Pais";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);

        session_start();

        $paises = [];

        while($fila !=0)
        {
            $pais = new Pais($fila->IdPais, $fila->NomPais);

            array_push($paises, $pais);
            $fila = mysqli_fetch_object($resultado);
        }
        $_SESSION["paises"] = $paises;

        desconectar($conexion);

    }

    public static function sacarAlbumes(){

        require_once '../Modelo/Album.php';

        $conexion = conectar();

        $user = unserialize($_SESSION["usuario"]);

        $consulta = "SELECT * FROM Album WHERE Usuario = '".$user->getNomusuario()."'";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);

        $albumes = [];

        while($fila != null)
        {
            $album = new Album($fila->Titulo, $fila->Descripcion, $fila->Fecha, $fila->Pais, $fila->Usuario);
            $album->setIdalbum($fila->IdAlbum);
            array_push($albumes, $album);
            $fila = mysqli_fetch_object($resultado);
        }
        $_SESSION["albumes"] = $albumes;

        desconectar($conexion);

    }

    public static function sacarFotos(){

        require_once '../Modelo/Foto.php';

        $conexion = conectar();

        $album = unserialize($_SESSION["album"]);

        $consulta = "SELECT * FROM Foto WHERE Album = '".$album->getIdalbum()."'";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);

        $fotos = [];

        while($fila != null)
        {
            $foto = new Foto($fila->Titulo, $fila->Fecha, $fila->Pais, $fila->Album, $fila->Fichero);
            array_push($fotos, $foto);
            $fila = mysqli_fetch_object($resultado);
        }
        $_SESSION["fotos"] = $fotos;

        desconectar($conexion);

    }

    public static function sacarUltimasFotos(){

        require_once '../Modelo/Foto.php';

        $conexion = conectar();

        $consulta = "SELECT * FROM Foto ORDER BY Fecha DESC LIMIT 5";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);

        $fotos = [];

        while($fila != null)
        {
            $foto = new Foto($fila->Titulo, $fila->Fecha, $fila->Pais, $fila->Album, $fila->Fichero);
            array_push($fotos, $foto);
            $fila = mysqli_fetch_object($resultado);
        }
        $_SESSION["ultimas"] = $fotos;

        desconectar($conexion);

    }

    public static function iniciosesion(){


        require_once '../Modelo/Usuario.php';
        require_once '../Modelo/GenericoBD.php';
        require_once '../Vista/Inicio.php';


        $conexion = conectar();

        $nomusuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $consulta = "SELECT * FROM Usuario WHERE NomUsuario ='".$nomusuario."' AND Contrasena = '".$contrasena."'";

        $resultado = mysqli_query($conexion, $consulta);



        if ($resultado->num_rows !=0)
        {
            $fila = mysqli_fetch_object($resultado);

            /* Creo el objeto usuario, para pasarlo a session y mantenerme iniciado */

            $usuario = new Usuario($fila->NomUsuario, $fila->Contrasena, $fila->Email, $fila->FNacimiento, $fila->Ciudad, $fila->Pais, $fila->Foto);

            session_start();

            $_SESSION["usuario"] = serialize($usuario);
            desconectar($conexion);
            header('Location: ../Vista/Principal.php');

        }

        else{
            desconectar($conexion);
            Inicio::formularioInicio($texto = '<div class="alert alert-danger" role="alert"><p>El usuario o la contraseña no coinciden, por favor intentelo de nuevo</p></div>', $ruta = 'router.php', $ruta2 = '../Vista/CSS/');
        }


    }

    public static function darBaja(){

        require_once '../Modelo/Usuario.php';
        require_once '../Modelo/GenericoBD.php';

        $user = unserialize($_SESSION["usuario"]);

        $conexion = conectar();

        $consulta = "DELETE FROM Usuario WHERE NomUsuario = '".$user->getNomusuario()."'";

        mysqli_query($conexion, $consulta);

        desconectar($conexion);
    }

    public static function registrarusuario(){

        require_once '../Modelo/Usuario.php';
        require_once '../Modelo/GenericoBD.php';


        $conexion = conectar();

        $nomusuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];
        $email = $_POST["email"];
        $fecha  = $_POST["fecha"];
        $ciudad  = $_POST["ciudad"];
        $pais  = $_POST["pais"];
        $archivoFoto  = $_FILES['foto']['tmp_name'];
        $destinoFoto = "../Fotos/".$_FILES['foto']['name'];
        move_uploaded_file($archivoFoto, $destinoFoto);

        $usuario = new Usuario($nomusuario, $contrasena ,$email ,$fecha ,$ciudad ,$pais , $destinoFoto);

        $consulta = "INSERT INTO Usuario (NomUsuario, Contrasena, Email, FNacimiento, Ciudad, Pais, Foto) VALUES ('".$usuario->getNomusuario()."', '".$usuario->getContrasena()."', '".$usuario->getEmail()."', '".$usuario->getFnacimiento()."', '".$usuario->getCiudad()."', '".$usuario->getPais()."', '".$usuario->getFoto()."')";

        mysqli_query($conexion, $consulta);

        desconectar($conexion);

    }

    public static function modificarUsuario(){

        require_once '../Modelo/Usuario.php';
        require_once '../Modelo/GenericoBD.php';

        $user = unserialize($_SESSION["usuario"]);

        $contrasena = $_POST["contrasena"];
        $email = $_POST["email"];
        $fecha  = $_POST["fecha"];
        $ciudad  = $_POST["ciudad"];
        $pais  = $_POST["pais"];
        $archivoFoto  = $_FILES['foto']['tmp_name'];
        $destinoFoto = "../Fotos/".$_FILES['foto']['name'];
        move_uploaded_file($archivoFoto, $destinoFoto);

        $user->setContrasena($contrasena);
        $user->setEmail($email);
        $user->setFnacimiento($fecha);
        $user->setCiudad($ciudad);
        $user->setPais($pais);
        $user->setFoto($destinoFoto);

        $conexion = conectar();

        $consulta = "UPDATE Usuario SET Contrasena='".$user->getContrasena()."', Email='".$user->getEmail()."', FNacimiento='".$user->getFnacimiento()."', Ciudad='".$user->getCiudad()."', Pais='".$user->getPais()."', Foto='".$user->getFoto()."'  WHERE NomUsuario = '".$user->getNomusuario()."'";

        mysqli_query($conexion, $consulta);

        $_SESSION["usuario"] = serialize($user);

        desconectar($conexion);

        header('Location: ../Vista/Principal.php');
    }

    public static function nuevoAlbum(){

        try{
        require_once '../Modelo/Album.php';
        require_once '../Modelo/Usuario.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $titulo = $_POST["titulo"];
        $descripcion = $_POST["descripcion"];
        $fecha  = $_POST["fecha"];
        $pais  = $_POST["pais"];

        $user = unserialize($_SESSION["usuario"]);

        $nombre  = $user->getNomusuario();

        $album = new Album($titulo, $descripcion ,$fecha ,$pais ,$nombre);

        $consulta = "INSERT INTO Album (Titulo, Descripcion, Fecha, Pais, Usuario) VALUES ('".$album->getTitulo()."', '".$album->getDescripcion()."', '".$album->getFecha()."', '".$album->getPais()."', '".$album->getUsuario()."')";

        mysqli_query($conexion, $consulta);

        desconectar($conexion);
        }catch (Exception $e){echo $e;}

    }

    public static function buscarAlbum(){

        require_once '../Modelo/Album.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $id = $_POST["album"];

        $consulta = "SELECT * FROM Album WHERE IdAlbum ='".$id."'";

        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado->num_rows !=0)
        {
            $fila = mysqli_fetch_object($resultado);

            /* Creo el objeto album, para pasarlo a session */

            $album = new Album($fila->Titulo, $fila->Descripcion, $fila->Fecha, $fila->Pais, $fila->Usuario);
            $album->setIdalbum($fila->IdAlbum);
            //session_start();

            $_SESSION["album"] = serialize($album);
            desconectar($conexion);
            return true;

        }else{
            desconectar($conexion);
            return false;
        }


    }

    public static function subirFoto(){

        require_once '../Modelo/Foto.php';
        require_once '../Modelo/GenericoBD.php';

        $conexion = conectar();

        $titulo = $_POST["titulo"];
        $fecha = $_POST["fecha"];
        $pais = $_POST["pais"];
        $album  = $_POST["album"];

        $archivoFoto  = $_FILES['foto']['tmp_name'];
        $destinoFoto = "../Fotos/".$_FILES['foto']['name'];
        move_uploaded_file($archivoFoto, $destinoFoto);

        $foto = new Foto($titulo, $fecha ,$pais ,$album, $destinoFoto);

        $consulta = "INSERT INTO Foto (Titulo, Fecha, Pais, Album, Fichero) VALUES ('".$foto->getTitulo()."', '".$foto->getFecha()."', '".$foto->getPais()."', '".$foto->getAlbum()."', '".$foto->getFichero()."')";

        mysqli_query($conexion, $consulta);

        desconectar($conexion);

    }

}