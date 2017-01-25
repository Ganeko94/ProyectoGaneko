<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 12:56
 */

    function conectar(){
        $conexion = mysqli_connect('localhost:3306', 'root', null, 'fotosbd');
        return $conexion;
    }

    function desconectar($conexion){
        mysqli_close($conexion);
    }

?>