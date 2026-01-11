<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../entity/Categoria.php';

class CategoriaDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function insert(Categoria $categoria)
    {
        $sql = "INSERT INTO categorias (nombre, descripcion) VALUES (:nombre, :descripcion)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nombre', $categoria->getNombre());
        $stmt->bindValue(':descripcion', $categoria->getDescripcion());
        return $stmt->execute();
    }

    public function update(Categoria $categoria)
    {
        $sql = "UPDATE categorias SET nombre = :nombre, descripcion = :descripcion WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nombre', $categoria->getNombre());
        $stmt->bindValue(':descripcion', $categoria->getDescripcion());
        $stmt->bindValue(':id', $categoria->getId());
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM categorias WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM categorias";
        $stmt = $this->conn->query($sql);
        $categorias = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $categorias[] = new Categoria($row['id'], $row['nombre'], $row['descripcion']);
        }
        return $categorias;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM categorias WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Categoria($row['id'], $row['nombre'], $row['descripcion']);
        }
        return null;
    }
}
?>