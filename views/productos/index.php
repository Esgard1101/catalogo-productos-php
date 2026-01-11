<?php
// Incluimos la lógica de negocio para productos
require_once '../../logic/ProductoLogic.php';
// Instanciamos la clase lógica y obtenemos todos los productos
$logic = new ProductoLogic();
$productos = $logic->obtenerTodos();
?>
<?php include '../layout/header.php'; ?>

<!-- Contenedor principal de la rejilla (Grid) de Bootstrap -->
<div class="row">
    <div class="col-md-12">
        <!-- Título y botón para crear nuevo producto -->
        <h2 class="mb-4">Gestión de Productos 
            <a href="save.php" class="btn btn-primary btn-sm float-end">Nuevo Producto</a>
        </h2>
        
        <!-- Tabla estylizada con Bootstrap -->
        <table class="table table-striped table-hover">
            <thead class="table-dark">
                <tr>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Categoría</th>
                    <th>Marca</th>
                    <th>Unidad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Iteramos sobre la lista de productos para generar las filas de la tabla -->
                <?php foreach ($productos as $p): ?>
                <tr>
                    <td><?php echo $p->getCodigo(); ?></td>
                    <td><?php echo $p->getNombre(); ?></td>
                    <!-- Mostramos nombres relacionados gracias a los JOINs en el DAO -->
                    <td><?php echo $p->getCategoriaNombre(); ?></td>
                    <td><?php echo $p->getMarcaNombre(); ?></td>
                    <td><?php echo $p->getUnidadNombre(); ?></td>
                    <td>
                        <!-- Botones de acción: Editar y Eliminar -->
                        <a href="save.php?id=<?php echo $p->getId(); ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="delete.php?id=<?php echo $p->getId(); ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este producto?');">Eliminar</a>
                    </td>
                </tr>
                <?php endforeach; ?>
                
                <!-- Mensaje si no hay productos -->
                <?php if(empty($productos)): ?>
                    <tr><td colspan="6" class="text-center">No hay productos registrados.</td></tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include '../layout/footer.php'; ?>