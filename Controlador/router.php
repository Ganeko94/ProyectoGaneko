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
require_once "../Vista/Views.php";




    if(isset($_POST["enviar"])){

        funciones::iniciosesion();
    }

    if(isset($_POST["registrarse"])){
        Registro::formularioRegistro();
    }

    if(isset($_POST["registrar"])){
        funciones::registrarusuario();
        funciones::iniciosesion();
        //Exito::mensajeExito();
    }

    if(isset($_POST["cancelar1"])){
        header('Location: ../index.php');
    }

    if(isset($_POST["cancelar2"])){
        header('Location: ../Vista/Principal.php');
    }

    if(isset($_POST["datos"])){
        Views::misDatos();
    }

    if(isset($_POST["baja"])){
        if($_POST["baja"] == "Darme de baja"){
            Views::ventanaBaja();
        }
        elseif($_POST["baja"] == "Borrar"){
            funciones::darBaja();
            header('Location: ../index.php');
        }


    }



