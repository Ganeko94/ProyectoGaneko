<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 13:05
 */
class logeo{

    public static function iniciosesion(){


        require_once '../Modelo/Usuario.php';
        require_once '../Modelo/GenericoBD.php';


        $conexion = conectar();

        $nomusuario = $_POST["usuario"];
        $contrasena = $_POST["contrasena"];

        $usuario = new Usuario();

        $consulta = "SELECT * FROM Usuario WHERE NomUsuario ='".$nomusuario."' AND Contrasena = '".$contrasena."'";

        $resultado = mysqli_query($conexion, $consulta);

        $fila = mysqli_fetch_object($resultado);

        if ($resultado->num_rows !=0)
        {
            session_start();

            $_SESSION["usuario"] = $fila->NomUsuario;

            header('Location: ../Vista/Principal.php');

        }

        else{
            header('Location: ../index.php');
        }

        desconectar($conexion);
    }

}