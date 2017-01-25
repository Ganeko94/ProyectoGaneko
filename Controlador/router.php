<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 24/1/17
 * Time: 13:00
 */

require_once "../Vista/Registro.php";
require_once "../Vista/Exito.php";
require_once "../Vista/Login.php";
require_once "logeo.php";




    if(isset($_POST["enviar"])){

        logeo::iniciosesion();
    }

    if(isset($_POST["registrarse"])){
        Registro::formularioRegistro();
    }

    if(isset($_POST["registrar"])){
        Exito::mensajeExito();
    }

    if(isset($_POST["cancelar"])){
        Login::formularioInicio();
    }



