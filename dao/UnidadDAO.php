<?php
require_once __DIR__ . '/../config/Database.php';
require_once __DIR__ . '/../entity/Unidad.php';

class UnidadDAO
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function insert(Unidad $unidad)
    {
        $sql = "INSERT INTO unidades (nombre, abreviatura) VALUES (:nombre, :abreviatura)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nombre', $unidad->getNombre());
        $stmt->bindValue(':abreviatura', $unidad->getAbreviatura());
        return $stmt->execute();
    }

    public function update(Unidad $unidad)
    {
        $sql = "UPDATE unidades SET nombre = :nombre, abreviatura = :abreviatura WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nombre', $unidad->getNombre());
        $stmt->bindValue(':abreviatura', $unidad->getAbreviatura());
        $stmt->bindValue(':id', $unidad->getId());
        return $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM unidades WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        return $stmt->execute();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM unidades";
        $stmt = $this->conn->query($sql);
        $unidades = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $unidades[] = new Unidad($row['id'], $row['nombre'], $row['abreviatura']);
        }
        return $unidades;
    }

    public function getById($id)
    {
        $sql = "SELECT * FROM unidades WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':id', $id);
        $stmt->execute();
        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            return new Unidad($row['id'], $row['nombre'], $row['abreviatura']);
        }
        return null;
    }
}
?>