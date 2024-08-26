<?php

class ProductoModel
{
    private $ID_Producto;
    private $Nombre;
    private $Descripcion;
    private $Precio;
    private $Stock;
    private $ID_Categoria;
    private $ID_Proveedor;

    public function __construct($ID_Producto, $Nombre, $Descripcion, $Precio, $Stock, $ID_Categoria, $ID_Proveedor)
    {
        $this->ID_Producto = $ID_Producto;
        $this->Nombre = $Nombre;
        $this->Descripcion = $Descripcion;
        $this->Precio = $Precio;
        $this->Stock = $Stock;
        $this->ID_Categoria = $ID_Categoria;
        $this->ID_Proveedor = $ID_Proveedor;
    }

    public function getID_Producto()
    {
        return $this->ID_Producto;
    }

    public function getNombre()
    {
        return $this->Nombre;
    }

    public function getDescripcion()
    {
        return $this->Descripcion;
    }

    public function getPrecio()
    {
        return $this->Precio;
    }

    public function getStock()
    {
        return $this->Stock;
    }

    public function getID_Categoria()
    {
        return $this->ID_Categoria;
    }

    public function getID_Proveedor()
    {
        return $this->ID_Proveedor;
    }

    public function setNombre($Nombre)
    {
        $this->Nombre = $Nombre;
    }

    public function setDescripcion($Descripcion)
    {
        $this->Descripcion = $Descripcion;
    }

    public function setPrecio($Precio)
    {
        $this->Precio = $Precio;
    }

    public function setStock($Stock)
    {
        $this->Stock = $Stock;
    }

    public function setID_Categoria($ID_Categoria)
    {
        $this->ID_Categoria = $ID_Categoria;
    }

    public function setID_Proveedor($ID_Proveedor)
    {
        $this->ID_Proveedor = $ID_Proveedor;
    }
}
