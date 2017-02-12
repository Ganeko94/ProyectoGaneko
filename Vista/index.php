<?php
/**
 * Created by PhpStorm.
 * User: ganek
 * Date: 12/02/2017
 * Time: 14:06
 */

require_once "Inicio.php";

if(isset($_SESSION["usuario"])){
    $_SESSION["usuario"] = null;
    session_destroy();

}

Inicio::formularioInicio();