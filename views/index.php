<?php include 'layout/header.php'; ?>
<div class="p-5 mb-4 bg-light rounded-3">
    <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Bienvenido al Sistema</h1>
        <p class="col-md-8 fs-4">Sistema de gestión.</p>
        <hr>
        <div class="row">
            <div class="col-md-3">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Productos</div>
                    <div class="card-body"><a href="productos/index.php" class="btn btn-light btn-sm">Ir a Productos</a></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Categorías</div>
                    <div class="card-body"><a href="categorias/index.php" class="btn btn-light btn-sm">Ir a Categorías</a></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Marcas</div>
                    <div class="card-body"><a href="marcas/index.php" class="btn btn-light btn-sm">Ir a Marcas</a></div>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Unidades</div>
                    <div class="card-body"><a href="unidades/index.php" class="btn btn-light btn-sm">Ir a Unidades</a></div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'layout/footer.php'; ?>