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

        $consulta = "SELECT * FROM Usuario WHERE NomUsuario ='".$nomusuario."' AND Contrasena = '".$contrasena."'";

        $resultado = mysqli_query($conexion, $consulta);



        if ($resultado->num_rows !=0)
        {
            $fila = mysqli_fetch_object($resultado);

            /* Creo el objeto usuario, para pasarlo a session y mantenerme iniciado */

            $usuario = new Usuario($fila->NomUsuario, $fila->Contrasena, $fila->Email, $fila->FNacimiento, $fila->Ciudad, $fila->Pais, $fila->Foto);
            $usuario->setIdusuario($fila->IdUsuario);

            session_start();

            $_SESSION["usuario"] = serialize($usuario);
            desconectar($conexion);
             header('Location: ../Vista/Principal.php');

        }

        else{
            desconectar($conexion);
            header('Location: ../index.php');
        }


    }

}