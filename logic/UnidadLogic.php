<?php
require_once __DIR__ . '/../dao/UnidadDAO.php';
require_once __DIR__ . '/../entity/Unidad.php';

class UnidadLogic
{
    private $dao;

    public function __construct()
    {
        $this->dao = new UnidadDAO();
    }

    public function guardar($nombre, $abreviatura, $id = null)
    {
        if (empty($nombre) || empty($abreviatura)) {
            throw new Exception("Nombre y abreviatura son obligatorios.");
        }

        $unidad = new Unidad($id, $nombre, $abreviatura);

        if ($id) {
            return $this->dao->update($unidad);
        } else {
            return $this->dao->insert($unidad);
        }
    }

    public function eliminar($id)
    {
        if (!$id)
            throw new Exception("ID inválido.");
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