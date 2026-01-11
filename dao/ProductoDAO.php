<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../entity/Producto.php';

class ProductoDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function insert(Producto $producto)
    {
        $sql = "INSERT INTO productos (codigo, nombre, precio_compra, precio_venta, id_categoria, id_marca, id_unidad) 
                VALUES (:codigo, :nombre, :precio_compra, :precio_venta, :id_categoria, :id_marca, :id_unidad)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':codigo', $producto->getCodigo());
        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':precio_compra', $producto->getPrecioCompra());
        $stmt->bindValue(':precio_venta', $producto->getPrecioVenta());
        $stmt->bindValue(':id_categoria', $producto->getIdCategoria());
        $stmt->bindValue(':id_marca', $producto->getIdMarca());
        $stmt->bindValue(':id_unidad', $producto->getIdUnidad());
        return $stmt->execute();
    }

    public function update(Producto $producto)
    {
        $sql = "UPDATE productos SET codigo = :codigo, nombre = :nombre, precio_compra = :precio_compra, 
                precio_venta = :precio_venta, id_categoria = :id_categoria, id_marca = :id_marca, id_unidad = :id_unidad 
                WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':codigo', $producto->getCodigo());
        $stmt->bindValue(':nombre', $producto->getNombre());
        $stmt->bindValue(':precio_compra', $producto->getPrecioCompra());
        $stmt->bindValue(':precio_venta', $producto->getPrecioVenta());
        $stmt->bindValue(':id_categoria', $producto->getIdCategoria());
        $stmt->bindValue(':id_marca', $producto->getIdMarca());
        $stmt->bindValue(':id_unidad', $producto->getIdUnidad());
        $stmt->bindValue(':id', $producto->getId());
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM productos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT p.*, c.nombre as categoria_nombre, m.nombre as marca_nombre, u.nombre as unidad_nombre 
                FROM productos p 
                LEFT JOIN categorias c ON p.id_categoria = c.id
                LEFT JOIN marcas m ON p.id_marca = m.id
                LEFT JOIN unidades u ON p.id_unidad = u.id";

        $stmt = $this->conn->query($sql);
        $productos = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $prod = new Producto(
                $row['id'],
                $row['codigo'],
                $row['nombre'],
                $row['precio_compra'],
                $row['precio_venta'],
                $row['id_categoria'],
                $row['id_marca'],
                $row['id_unidad']
            );
            $prod->setCategoriaNombre($row['categoria_nombre']);
            $prod->setMarcaNombre($row['marca_nombre']);
            $prod->setUnidadNombre($row['unidad_nombre']);
            $productos[] = $prod;
        }
        return $productos;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM productos WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Producto(
                $row['id'],
                $row['codigo'],
                $row['nombre'],
                $row['precio_compra'],
                $row['precio_venta'],
                $row['id_categoria'],
                $row['id_marca'],
                $row['id_unidad']
            );
        }
        return null;
    }

    public function getByCodigo($codigo)
    {
        $sql = "SELECT * FROM productos WHERE codigo = :codigo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':codigo', $codigo);
        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Producto($row['id'], $row['codigo'], $row['nombre']);
        }
        return null;
    }
}
?>