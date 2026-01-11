<?php
require_once '../../logic/UnidadLogic.php';
$logic = new UnidadLogic();
$id = $_GET['id'] ?? null;
if ($id)
    $logic->eliminar($id);
header("Location: index.php");
exit;
?>