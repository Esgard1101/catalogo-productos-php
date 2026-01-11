<?php
require_once __DIR__ . '/../dao/ProductoDAO.php';
require_once __DIR__ . '/../entity/Producto.php';

class ProductoLogic
{
    private $dao;

    public function __construct()
    {
        $this->dao = new ProductoDAO();
    }

    public function guardar($codigo, $nombre, $pCompra, $pVenta, $idCat, $idMarca, $idUnidad, $id = null)
    {
        if (empty($codigo) || empty($nombre)) {
            throw new Exception("Código y Nombre son obligatorios.");
        }
        if (!is_numeric($pCompra) || $pCompra < 0)
            throw new Exception("Precio compra inválido.");
        if (!is_numeric($pVenta) || $pVenta < 0)
            throw new Exception("Precio venta inválido.");

        if (!$id) {
            $existente = $this->dao->getByCodigo($codigo);
            if ($existente)
                throw new Exception("El código ya existe.");
        } else {
            $existente = $this->dao->getByCodigo($codigo);
            if ($existente && $existente->getId() != $id)
                throw new Exception("El código ya existe en otro producto.");
        }

        $producto = new Producto($id, $codigo, $nombre, $pCompra, $pVenta, $idCat, $idMarca, $idUnidad);

        if ($id) {
            return $this->dao->update($producto);
        } else {
            return $this->dao->insert($producto);
        }
    }

    public function eliminar($id)
    {
        return $this->dao->delete($id);
    }

    public function obtenerTodos()
    {
        return $this->dao->getAll();
    }

    public function obtenerPorId($id)
    {
        return $this->dao->getById($id);
    }
}
?>