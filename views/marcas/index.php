<?php
require_once '../../logic/MarcaLogic.php';
$logic = new MarcaLogic();
$marcas = $logic->obtenerTodos();
?>
<?php include '../layout/header.php'; ?>
<div class="row">
    <div class="col-md-12">
        <h2>Gestión de Marcas <a href="save.php" class="btn btn-primary btn-sm">Nueva</a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($marcas as $m): ?>
                    <tr>
                        <td><?php echo $m->getId(); ?></td>
                        <td><?php echo $m->getNombre(); ?></td>
                        <td>
                            <a href="save.php?id=<?php echo $m->getId(); ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="delete.php?id=<?php echo $m->getId(); ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../layout/footer.php'; ?>