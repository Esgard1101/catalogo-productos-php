<?php
require_once '../../logic/CategoriaLogic.php';
$logic = new CategoriaLogic();
$id = $_GET['id'] ?? null;
if ($id)
    $logic->eliminar($id);
header("Location: index.php");
exit;
?>