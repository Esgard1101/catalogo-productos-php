<?php
// Incluimos la lógica de categorías
require_once '../../logic/CategoriaLogic.php';
// Instanciamos el controlador lógico
$logic = new CategoriaLogic();
// Obtenemos el listado completo de categorías
$categorias = $logic->obtenerTodos();
?>
<?php include '../layout/header.php'; ?>
<div class="row">
    <div class="col-md-12">
        <!-- Encabezado con título y botón de crear -->
        <h2 class="mb-4">Gestión de Categorías 
            <a href="save.php" class="btn btn-primary btn-sm float-end">Nueva Categoría</a>
        </h2>
        
        <!-- Tabla de listado -->
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripción</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Bucle para mostrar cada categoría -->
                <?php foreach ($categorias as $c): ?>
                <tr>
                    <td><?php echo $c->getId(); ?></td>
                    <td><?php echo $c->getNombre(); ?></td>
                    <td><?php echo $c->getDescripcion(); ?></td>
                    <td>
                        <a href="save.php?id=<?php echo $c->getId(); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?php echo $c->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar esta categoría?');">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <?php if(empty($categorias)): ?>
                    <tr><td colspan="4" class="text-center">No hay categorías registradas.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../layout/footer.php'; ?>