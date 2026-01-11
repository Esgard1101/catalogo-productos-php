<?php
require_once __DIR__ . '/../dao/CategoriaDAO.php';
require_once __DIR__ . '/../entity/Categoria.php';

class CategoriaLogic
{
    private $dao;

    public function __construct()
    {
        $this->dao = new CategoriaDAO();
    }

    public function guardar($nombre, $descripcion, $id = null)
    {
        if (empty($nombre)) {
            throw new Exception("El nombre es obligatorio.");
        }

        $categoria = new Categoria($id, $nombre, $descripcion);

        if ($id) {
            return $this->dao->update($categoria);
        } else {
            return $this->dao->insert($categoria);
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