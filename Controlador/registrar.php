<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 13:50
 */

class registrar{

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