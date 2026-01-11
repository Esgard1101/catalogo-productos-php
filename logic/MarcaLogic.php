<?php
require_once __DIR__ . '/../dao/MarcaDAO.php';
require_once __DIR__ . '/../entity/Marca.php';

class MarcaLogic
{
    private $dao;

    public function __construct()
    {
        $this->dao = new MarcaDAO();
    }

    public function guardar($nombre, $id = null)
    {
        if (empty($nombre)) {
            throw new Exception("El nombre es obligatorio.");
        }

        $marca = new Marca($id, $nombre);

        if ($id) {
            return $this->dao->update($marca);
        } else {
            return $this->dao->insert($marca);
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