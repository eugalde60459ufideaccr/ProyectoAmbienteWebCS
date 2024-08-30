<?php

class ProveedorModel
{
    private $id;
    private $nombre;
    private $contacto;

    public function __construct($id, $nombre, $contacto)
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->contacto = $contacto;
    }

    public function getId()
    {
        return $this->id;
    }

    public function getNombre()
    {
        return $this->nombre;
    }

    public function getContacto()
    {
        return $this->contacto;
    }

    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }

    public function setContacto($contacto)
    {
        $this->contacto = $contacto;
    }
}
