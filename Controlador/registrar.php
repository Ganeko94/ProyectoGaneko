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


        $usuario = new Usuario();

        /*tengo que rellenar el objeto  y terminar la frase de consulta*/

        $consulta = 'INSERT INTO Usuario (IdUsuario, NomUsuario, Contrasena, Email, FNacimiento, Ciudad, Pais, Foto, FRegistro) VALUES (NULL, '".$hihi."', '', '', '', '', '', '', '')';

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);



        desconectar($conexion);
    }

}