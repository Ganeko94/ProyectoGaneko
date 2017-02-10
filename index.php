<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 24/1/17
 * Time: 12:00
 */

require_once "Vista/Inicio.php";

if(isset($_SESSION["usuario"])){
    $_SESSION["usuario"] = null;
    session_destroy();

}

Inicio::formularioInicio();

?>