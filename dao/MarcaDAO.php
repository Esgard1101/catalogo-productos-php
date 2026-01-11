<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../entity/Marca.php';

class MarcaDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function insert(Marca $marca)
    {
        $sql = "INSERT INTO marcas (nombre) VALUES (:nombre)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nombre', $marca->getNombre());
        return $stmt->execute();
    }

    public function update(Marca $marca)
    {
        $sql = "UPDATE marcas SET nombre = :nombre WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nombre', $marca->getNombre());
        $stmt->bindValue(':id', $marca->getId());
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM marcas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM marcas";
        $stmt = $this->conn->query($sql);
        $marcas = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $marcas[] = new Marca($row['id'], $row['nombre']);
        }
        return $marcas;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM marcas WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Marca($row['id'], $row['nombre']);
        }
        return null;
    }
}
?>