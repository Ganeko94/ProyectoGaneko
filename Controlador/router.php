<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 24/1/17
 * Time: 13:00
 */

require_once "../Vista/Registro.php";
require_once "../Vista/Exito.php";
require_once "../Vista/Views.php";




    if(isset($_POST["entrar"])){
        funciones::iniciosesion();
    }
    elseif(isset($_POST["registrarse"])){
        Registro::formularioRegistro();
    }
    elseif(isset($_POST["registrar"])){
        funciones::registrarusuario();
        funciones::iniciosesion();
    }
    elseif(isset($_POST["cancelar1"])){
        header('Location: ../index.php');
    }
    elseif(isset($_POST["cancelar2"])){
        header('Location: ../Vista/Principal.php');
    }
    if(isset($_POST["buscarfoto"])){
        Views::busquedaFotos();
    }
    elseif(isset($_POST["datos"])){
        Views::misDatos();
    }
    elseif(isset($_POST["update"])){
        funciones::modificarUsuario();
    }
    elseif(isset($_POST["baja"])){
        if($_POST["baja"] == "Darme de baja"){
            Views::ventanaBaja();
        }
        elseif($_POST["baja"] == "Borrar"){
            funciones::darBaja();
            header('Location: ../index.php');
        }
    }
    elseif(isset($_POST["albumes"])){
        Views::misAlbumes();
    }
    elseif(isset($_POST["veralbum"])){
        if(funciones::buscarAlbum()){
            Views::vistaAlbum();
        }else{
            header('Location: ../Vista/Principal.php');
        }
    }
    elseif(isset($_POST["nuevafoto"])){
            Views::subidaFoto();
    }
    elseif(isset($_POST["anadirfoto"])){
        funciones::subirFoto();
        header('Location: ../Vista/Principal.php');
    }
    elseif(isset($_POST["nuevoalbum"])){
        if($_POST["nuevoalbum"] == "Crear album"){
            Views::crearAlbum();
        }
        elseif($_POST["nuevoalbum"] == "Crear"){
            funciones::nuevoAlbum();
            header('Location: ../Vista/Principal.php');
        }
    }
    elseif(isset($_POST["cerrarsesion"])){
        $_SESSION["usuario"] = null;
        header('Location: ../index.php');
    }