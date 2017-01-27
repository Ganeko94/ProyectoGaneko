<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 12:57
 */

class Pais{

    private $idpais;
    private $nompais;

    /**
     * Pais constructor.
     * @param $idpais
     * @param $nompais
     */
    public function __construct($idpais, $nompais)
    {
        $this->idpais = $idpais;
        $this->nompais = $nompais;
    }

    /**
     * @return mixed
     */
    public function getIdpais()
    {
        return $this->idpais;
    }

    /**
     * @param mixed $idpais
     */
    public function setIdpais($idpais)
    {
        $this->idpais = $idpais;
    }

    /**
     * @return mixed
     */
    public function getNompais()
    {
        return $this->nompais;
    }

    /**
     * @param mixed $nompais
     */
    public function setNompais($nompais)
    {
        $this->nompais = $nompais;
    }



}

//Hago una select de todos los paises, meto el arrayq ue me devuelve en session, y cargo la funcion