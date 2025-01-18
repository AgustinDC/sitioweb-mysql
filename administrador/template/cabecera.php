<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sitio Web</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>
<body>

    <?php $url = "http://" . $_SERVER['HTTP_HOST'] . '/sitioweb-mysql'; ?>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <ul class="nav navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">Administrador del sitio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url . '/administrador/index.php' ?>">Inicio</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href=" <?php echo $url . '/administrador/seccion/productos.php'?>">Libros</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url . '/administrador/seccion/cerrar.php' ?>">Cerrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo $url; ?>">Ver sitio Web</a>
            </li>
        </ul>
    </nav>

    <div class="container">
        <div class="row">