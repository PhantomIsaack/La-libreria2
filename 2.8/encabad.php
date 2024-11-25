<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio - La Librería</title>
    <link rel="stylesheet" href="estilos/inicio.css">

    <?php
    if (isset($iniciopage_css)) {
        echo '<link rel="stylesheet" href="' . $iniciopage_css . '">';
    }
    ?>
    <?php
    if (isset($inicioxja_js)) {
        echo '<script src="' . $inicioja_js . '" defer></script>';
    }
    ?>

</head>
<body>
    <header>
    <div class="logo-container">
        <a href="inicio.php">
            <img src="imagenes/logolib.jpg" alt="La Librería" class="logo">
            <h1>La Librería</h1>
        </a>
    </div>

        <nav>
            <ul class="nav-links">
                <a href="cerradmin.php">Cerrar Sesión</a>
                <li><a href="inicio.php">Inicio</a></li>
                <li><a href="usuarios.php">Usuarios</a></li>
                <li><a href="administradores.php">Administradores</a></li>
                <li><a href="ventas.php">Ventas</a></li>
                <li><a href="productos.php">Productos</a></li>
            </ul>
        </nav>
    </header>