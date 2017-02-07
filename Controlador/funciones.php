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
        $foto  = $_POST["foto"];

        $usuario = new Usuario($nomusuario, $contrasena ,$email ,$fecha ,$ciudad ,$pais ,$foto);

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
        $foto  = $_POST["foto"];

        $user->setContrasena($contrasena);
        $user->setEmail($email);
        $user->setFnacimiento($fecha);
        $user->setCiudad($ciudad);
        $user->setPais($pais);
        $user->setFoto($foto);

        $conexion = conectar();

        $consulta = "UPDATE Usuario SET Contrasena='".$user->getContrasena()."', Email='".$user->getEmail()."', FNacimiento='".$user->getFnacimiento()."', Ciudad='".$user->getCiudad()."', Pais='".$user->getPais()."', Foto='".$user->getFoto()."'  WHERE NomUsuario = '".$user->getNomusuario()."'";

        mysqli_query($conexion, $consulta);

        $_SESSION["usuario"] = serialize($user);

        desconectar($conexion);
    }

}