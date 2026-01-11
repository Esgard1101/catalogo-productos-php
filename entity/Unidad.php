<?php
class Unidad
{
    private $id;
    private $nombre;
    private $abreviatura;

    public function __construct($id = null, $nombre = null, $abreviatura = null)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->abreviatura = $abreviatura;
    }

    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getAbreviatura()
    {
        return $this->abreviatura;
    }
    public function setAbreviatura($abreviatura)
    {
        $this->abreviatura = $abreviatura;
    }
}
?>