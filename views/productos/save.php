<?php
// Incluimos las clases lógicas necesarias para cargar selectores y guardar el producto
require_once '../../logic/ProductoLogic.php';
require_once '../../logic/CategoriaLogic.php';
require_once '../../logic/MarcaLogic.php';
require_once '../../logic/UnidadLogic.php';

// Instanciamos las clases
$pLogic = new ProductoLogic();
$cLogic = new CategoriaLogic();
$mLogic = new MarcaLogic();
$uLogic = new UnidadLogic();

// Buscamos si existe un ID en la URL. Si existe, estamos editando; si no, creando uno nuevo.
$id = $_GET['id'] ?? null;
$p = null;
if ($id)
    $p = $pLogic->obtenerPorId($id); // Cargamos datos del producto para editar

// Cargamos las listas para los selectores (combos) del formulario
$cats = $cLogic->obtenerTodos();
$marcas = $mLogic->obtenerTodos();
$unis = $uLogic->obtenerTodos();

// Procesamos el formulario cuando se envía (POST)
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    try {
        // Llamamos al método guardar con los datos del formulario
        $pLogic->guardar(
            $_POST['codigo'],
            $_POST['nombre'],
            $_POST['precio_compra'],
            $_POST['precio_venta'],
            $_POST['id_categoria'],
            $_POST['id_marca'],
            $_POST['id_unidad'],
            $id // Si es null se inserta, si tiene valor se actualiza
        );
        // Redireccionamos al listado tras guardar exitosamente
        header("Location: index.php");
        exit;
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
?>
<?php include '../layout/header.php'; ?>

<!-- Mostramos error si ocurre -->
<?php if (isset($error)): ?>
    <div class="alert alert-danger"><?php echo $error; ?></div>
<?php endif; ?>

<!-- Formulario para Crear/Editar Producto -->
<h2 class="mb-4"><?php echo $id ? 'Editar' : 'Nuevo'; ?> Producto</h2>

<form method="POST">
    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Código</label>
            <input type="text" name="codigo" class="form-control" value="<?php echo $p ? $p->getCodigo() : ''; ?>"
                required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="<?php echo $p ? $p->getNombre() : ''; ?>"
                required>
        </div>
    </div>

    <div class="row mb-3">
        <div class="col-md-6">
            <label class="form-label">Precio Compra</label>
            <input type="number" step="0.01" name="precio_compra" class="form-control"
                value="<?php echo $p ? $p->getPrecioCompra() : ''; ?>" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Precio Venta</label>
            <input type="number" step="0.01" name="precio_venta" class="form-control"
                value="<?php echo $p ? $p->getPrecioVenta() : ''; ?>" required>
        </div>
    </div>

    <!-- Selectores cargados dinámicamente -->
    <div class="mb-3">
        <label class="form-label">Categoría</label>
        <select name="id_categoria" class="form-select" required>
            <option value="">Seleccione una categoría</option>
            <?php foreach ($cats as $c): ?>
                <option value="<?php echo $c->getId(); ?>" <?php echo ($p && $p->getIdCategoria() == $c->getId()) ? 'selected' : ''; ?>>
                    <?php echo $c->getNombre(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Marca</label>
        <select name="id_marca" class="form-select" required>
            <option value="">Seleccione una marca</option>
            <?php foreach ($marcas as $m): ?>
                <option value="<?php echo $m->getId(); ?>" <?php echo ($p && $p->getIdMarca() == $m->getId()) ? 'selected' : ''; ?>>
                    <?php echo $m->getNombre(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label class="form-label">Unidad</label>
        <select name="id_unidad" class="form-select" required>
            <option value="">Seleccione una unidad</option>
            <?php foreach ($unis as $u): ?>
                <option value="<?php echo $u->getId(); ?>" <?php echo ($p && $p->getIdUnidad() == $u->getId()) ? 'selected' : ''; ?>>
                    <?php echo $u->getNombre(); ?>
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="d-grid gap-2">
        <button type="submit" class="btn btn-primary btn-lg">Guardar Producto</button>
        <a href="index.php" class="btn btn-secondary">Cancelar</a>
    </div>
</form>
<?php include '../layout/footer.php'; ?>