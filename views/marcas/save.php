<?php
require_once '../../logic/MarcaLogic.php';
$logic = new MarcaLogic();
$id = $_GET['id'] ?? null;
$item = null;
if ($id) $item = $logic->obtenerPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $logic->guardar($_POST['nombre'], $id);
        header("Location: index.php"); exit;
    } catch (Exception $e) { $error = $e->getMessage(); }
}
?>
<?php include '../layout/header.php'; ?>
<form method="POST">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $item ? $item->getNombre() : ''; ?>" required>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<?php include '../layout/footer.php'; ?>