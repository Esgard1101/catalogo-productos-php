<?php
require_once '../../logic/MarcaLogic.php';
$logic = new MarcaLogic();
$id = $_GET['id'] ?? null;
if ($id)
    $logic->eliminar($id);
header("Location: index.php");
exit;
?>