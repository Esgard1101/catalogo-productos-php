<?php
class Producto
{
    private $id;
    private $codigo;
    private $nombre;
    private $precio_compra;
    private $precio_venta;
    private $id_categoria;
    private $id_marca;
    private $id_unidad;

    // Campos extra para JOINS
    private $categoria_nombre;
    private $marca_nombre;
    private $unidad_nombre;

    public function __construct($id = null, $codigo = null, $nombre = null, $precio_compra = null, $precio_venta = null, $id_categoria = null, $id_marca = null, $id_unidad = null)
    {
        $this->id = $id;
        $this->codigo = $codigo;
        $this->nombre = $nombre;
        $this->precio_compra = $precio_compra;
        $this->precio_venta = $precio_venta;
        $this->id_categoria = $id_categoria;
        $this->id_marca = $id_marca;
        $this->id_unidad = $id_unidad;
    }

    // Getters y Setters
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getCodigo()
    {
        return $this->codigo;
    }
    public function setCodigo($codigo)
    {
        $this->codigo = $codigo;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function getPrecioCompra()
    {
        return $this->precio_compra;
    }
    public function setPrecioCompra($precio_compra)
    {
        $this->precio_compra = $precio_compra;
    }
    public function getPrecioVenta()
    {
        return $this->precio_venta;
    }
    public function setPrecioVenta($precio_venta)
    {
        $this->precio_venta = $precio_venta;
    }
    public function getIdCategoria()
    {
        return $this->id_categoria;
    }
    public function setIdCategoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;
    }
    public function getIdMarca()
    {
        return $this->id_marca;
    }
    public function setIdMarca($id_marca)
    {
        $this->id_marca = $id_marca;
    }
    public function getIdUnidad()
    {
        return $this->id_unidad;
    }
    public function setIdUnidad($id_unidad)
    {
        $this->id_unidad = $id_unidad;
    }

    // Extras
    public function getCategoriaNombre()
    {
        return $this->categoria_nombre;
    }
    public function setCategoriaNombre($categoria_nombre)
    {
        $this->categoria_nombre = $categoria_nombre;
    }
    public function getMarcaNombre()
    {
        return $this->marca_nombre;
    }
    public function setMarcaNombre($marca_nombre)
    {
        $this->marca_nombre = $marca_nombre;
    }
    public function getUnidadNombre()
    {
        return $this->unidad_nombre;
    }
    public function setUnidadNombre($unidad_nombre)
    {
        $this->unidad_nombre = $unidad_nombre;
    }
}
?>