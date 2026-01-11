<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Catálogo de Productos</title>
    <!-- Bootstrap 5 CDN: Librería de estilos CSS para un diseño moderno y responsive -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <!-- Barra de Navegación (Navbar) de Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4">
        <div class="container">
            <!-- Marca/Logo que redirige al inicio -->
            <a class="navbar-brand" href="/catalogo-productosV1/views/index.php">Catálogo</a>

            <!-- Botón para dispositivos móviles (Menú hamburguesa) -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Enlaces de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                  
                    <li class="nav-item"><a class="nav-link"
                            href="/catalogo-productosV1/views/productos/index.php">Productos</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="/catalogo-productosV1/views/categorias/index.php">Categorías</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="/catalogo-productosV1/views/marcas/index.php">Marcas</a></li>
                    <li class="nav-item"><a class="nav-link"
                            href="/catalogo-productosV1/views/unidades/index.php">Unidades</a></li>
                </ul>
            </div>
        </div>
    </nav>
    
    <div class="container">