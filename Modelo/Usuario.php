<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 12:57
 */

class Usuario{

    private $nomusuario;
    private $contrasena;
    private $email;
    private $fnacimiento;
    private $ciudad;
    private $pais;
    private $foto;
    private $fregistro;

    /**
     * Usuario constructor.
     * @param $nomusuario
     * @param $contrasena
     * @param $email
     * @param $fnacimiento
     * @param $ciudad
     * @param $pais
     * @param $foto
     * @param $fregistro
     */
    public function __construct($nomusuario, $contrasena, $email, $fnacimiento, $ciudad, $pais, $foto, $fregistro)
    {
        $this->nomusuario = $nomusuario;
        $this->contrasena = $contrasena;
        $this->email = $email;
        $this->fnacimiento = $fnacimiento;
        $this->ciudad = $ciudad;
        $this->pais = $pais;
        $this->foto = $foto;
        $this->fregistro = $fregistro;
    }

    /**
     * @return mixed
     */
    public function getNomusuario()
    {
        return $this->nomusuario;
    }

    /**
     * @param mixed $nomusuario
     */
    public function setNomusuario($nomusuario)
    {
        $this->nomusuario = $nomusuario;
    }

    /**
     * @return mixed
     */
    public function getContrasena()
    {
        return $this->contrasena;
    }

    /**
     * @param mixed $contrasena
     */
    public function setContrasena($contrasena)
    {
        $this->contrasena = $contrasena;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getFnacimiento()
    {
        return $this->fnacimiento;
    }

    /**
     * @param mixed $fnacimiento
     */
    public function setFnacimiento($fnacimiento)
    {
        $this->fnacimiento = $fnacimiento;
    }

    /**
     * @return mixed
     */
    public function getCiudad()
    {
        return $this->ciudad;
    }

    /**
     * @param mixed $ciudad
     */
    public function setCiudad($ciudad)
    {
        $this->ciudad = $ciudad;
    }

    /**
     * @return mixed
     */
    public function getPais()
    {
        return $this->pais;
    }

    /**
     * @param mixed $pais
     */
    public function setPais($pais)
    {
        $this->pais = $pais;
    }

    /**
     * @return mixed
     */
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * @param mixed $foto
     */
    public function setFoto($foto)
    {
        $this->foto = $foto;
    }

    /**
     * @return mixed
     */
    public function getFregistro()
    {
        return $this->fregistro;
    }

    /**
     * @param mixed $fregistro
     */
    public function setFregistro($fregistro)
    {
        $this->fregistro = $fregistro;
    }




}