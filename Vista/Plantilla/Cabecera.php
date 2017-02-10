<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 2/2/17
 * Time: 12:14
 */

class Cabecera{

    public static function mostrarCabecera($titulo){
        echo '    <!DOCTYPE html>
                  <html lang="es">
                  <head>
                    <meta charset="UTF-8">
                    <title>'.$titulo.'</title>
                    <link href="../Vista/CSS/style.css" type="text/css" rel="stylesheet">
                    <link href="../Vista/CSS/bootstrap/css/bootstrap.min.css" type="text/css" rel="stylesheet">
                  </head>';
    }

}