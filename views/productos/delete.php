<?php
require_once '../../logic/ProductoLogic.php';
$logic = new ProductoLogic();
$id = $_GET['id'] ?? null;
if ($id)
    $logic->eliminar($id);
header("Location: index.php");
exit;
?>