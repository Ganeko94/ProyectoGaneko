<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 13/2/17
 * Time: 11:02
 */

require_once "Inicio.php";

if(isset($_SESSION["usuario"])){
    $_SESSION["usuario"] = null;
    session_destroy();

}

Inicio::formularioInicio();