<?php
require_once '../../logic/UnidadLogic.php';
$logic = new UnidadLogic();
$id = $_GET['id'] ?? null;
$unidad = null;
if ($id) $unidad = $logic->obtenerPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $logic->guardar($_POST['nombre'], $_POST['abreviatura'], $id);
        header("Location: index.php"); exit;
    } catch (Exception $e) { $error = $e->getMessage(); }
}
?>
<?php include '../layout/header.php'; ?>
<form method="POST">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $unidad ? $unidad->getNombre() : ''; ?>" required>
    </div>
    <div class="mb-3">
        <label>Abreviatura</label>
        <input type="text" name="abreviatura" class="form-control" value="<?php echo $unidad ? $unidad->getAbreviatura() : ''; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<?php include '../layout/footer.php'; ?>