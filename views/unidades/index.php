<?php
require_once '../../logic/UnidadLogic.php';
$logic = new UnidadLogic();
$unidades = $logic->obtenerTodos();
?>
<?php include '../layout/header.php'; ?>
<div class="row">
    <div class="col-md-12">
        <h2>Gestión de Unidades <a href="save.php" class="btn btn-primary btn-sm">Nueva</a></h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($unidades as $u): ?>
                    <tr>
                        <td><?php echo $u->getId(); ?></td>
                        <td><?php echo $u->getNombre(); ?></td>
                        <td><?php echo $u->getAbreviatura(); ?></td>
                        <td>
                            <a href="save.php?id=<?php echo $u->getId(); ?>" class="btn btn-warning btn-sm">Editar</a>
                            <a href="delete.php?id=<?php echo $u->getId(); ?>" class="btn btn-danger btn-sm"
                                onclick="return confirm('¿Eliminar?');">Eliminar</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include '../layout/footer.php'; ?>