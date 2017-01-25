<?php
/**
 * Created by PhpStorm.
 * User: 2gdwes04
 * Date: 25/1/17
 * Time: 12:57
 */

class Foto{

    private $titulo;
    private $fecha;
    private $pais;
    private $album;
    private $fichero;
    private $fregistro;

    /**
     * Foto constructor.
     * @param $titulo
     * @param $fecha
     * @param $pais
     * @param $album
     * @param $fichero
     * @param $fregistro
     */
    public function __construct($titulo, $fecha, $pais, $album, $fichero, $fregistro)
    {
        $this->titulo = $titulo;
        $this->fecha = $fecha;
        $this->pais = $pais;
        $this->album = $album;
        $this->fichero = $fichero;
        $this->fregistro = $fregistro;
    }

    /**
     * @return mixed
     */
    public function getTitulo()
    {
        return $this->titulo;
    }

    /**
     * @param mixed $titulo
     */
    public function setTitulo($titulo)
    {
        $this->titulo = $titulo;
    }

    /**
     * @return mixed
     */
    public function getFecha()
    {
        return $this->fecha;
    }

    /**
     * @param mixed $fecha
     */
    public function setFecha($fecha)
    {
        $this->fecha = $fecha;
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
    public function getAlbum()
    {
        return $this->album;
    }

    /**
     * @param mixed $album
     */
    public function setAlbum($album)
    {
        $this->album = $album;
    }

    /**
     * @return mixed
     */
    public function getFichero()
    {
        return $this->fichero;
    }

    /**
     * @param mixed $fichero
     */
    public function setFichero($fichero)
    {
        $this->fichero = $fichero;
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