<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 12:57
 */

class Pais{

    private $nompais;

    /**
     * Pais constructor.
     * @param $nompais
     */
    public function __construct($nompais)
    {
        $this->nompais = $nompais;
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