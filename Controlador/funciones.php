<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 27/1/17
 * Time: 12:34
 */

class funciones{

    public static function sacarPaises(){

        require_once '../Modelo/Pais.php';
        require_once '../Modelo/GenericoBD.php';


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

}