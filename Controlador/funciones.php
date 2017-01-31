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

    public static function darBaja($id){

        $user = unserialize($_SESSION["usuario"]);

        $conexion = conectar();

        $consulta = "DELETE * FROM Usuario WHERE IdUsuario = '".$user->getIdusuario()."'";

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

}