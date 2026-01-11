<?php
require_once '../../logic/CategoriaLogic.php';
$logic = new CategoriaLogic();
$id = $_GET['id'] ?? null;
$item = null;
if ($id)
    $item = $logic->obtenerPorId($id);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        $logic->guardar($_POST['nombre'], $_POST['descripcion'], $id);
        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<?php include '../layout/header.php'; ?>
<form method="POST">
    <div class="mb-3">
        <label>Nombre</label>
        <input type="text" name="nombre" class="form-control" value="<?php echo $item ? $item->getNombre() : ''; ?>"
            required>
    </div>
    <div class="mb-3">
        <label>Descripción</label>
        <textarea name="descripcion" class="form-control"><?php echo $item ? $item->getDescripcion() : ''; ?></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>
<?php include '../layout/footer.php'; ?>