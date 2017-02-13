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
require_once "UsuarioBD.php";


    if(isset($_POST["entrar"])){
        UsuarioBD::iniciosesion();
    }
    elseif(isset($_POST["registrarse"])){
        Registro::formularioRegistro();
    }
    elseif(isset($_POST["registrar"])){
        UsuarioBD::registrarusuario();
        UsuarioBD::iniciosesion();
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
        UsuarioBD::modificarUsuario();
    }
    elseif(isset($_POST["baja"])){
        if($_POST["baja"] == "Darme de baja"){
            Views::ventanaBaja();
        }
        elseif($_POST["baja"] == "Borrar"){
            UsuarioBD::darBaja();
            header('Location: ../index.php');
        }
    }
    elseif(isset($_POST["albumes"])){
        Views::misAlbumes();
    }
    elseif(isset($_POST["veralbum"])){
        if(AlbumBD::buscarAlbum()){
            Views::vistaAlbum();
        }else{
            header('Location: ../Vista/Principal.php');
        }
    }
    elseif(isset($_POST["nuevafoto"])){
            Views::subidaFoto();
    }
    elseif(isset($_POST["anadirfoto"])){
        FotoBD::subirFoto();
        header('Location: ../Vista/Principal.php');
    }
    elseif(isset($_POST["nuevoalbum"])){
        if($_POST["nuevoalbum"] == "Crear album"){
            Views::crearAlbum();
        }
        elseif($_POST["nuevoalbum"] == "Crear"){
            AlbumBD::nuevoAlbum();
            header('Location: ../Vista/Principal.php');
        }
    }
    elseif(isset($_POST["cerrarsesion"])){
        $_SESSION["usuario"] = null;
        header('Location: ../index.php');
    }