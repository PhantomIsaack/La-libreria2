<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La librería</title>
    <link rel="stylesheet" href="estilos/encab.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <?php
    if (isset($indexpage_css)) {
        echo '<link rel="stylesheet" href="' . $indexpage_css . '">';
    }
    ?>
    <?php
    if (isset($indexja_js)) {
        echo '<script src="' . $indexja_js . '" defer></script>';
    }
    ?>
</head>

<body>
<header>
<div class="back">
        <div class="menu container">
            <a href="index.php" class="logo">
                <img src="imagenes/logolib.jpg" alt="Logo de la página" class="logo-img">
                La librería
            </a>
            <input type="checkbox" id="menu"/>
            <label for="menu">
                <img src="imagenes/menu.png" class="menu-icono" alt="imagen">
            </label>
            <nav class="navbar">
                <ul>
                    <li><a href="index.php">Inicio</a></li>
                    <li>
                    <div class="menu-item">
                        <a class="narrable">Libros</a>
                        <div class="submenu">
                            <a class="narrable" href="ciyte.php">Ciencia y Tecnología</a>
                            <a class="narrable" href="ficcion.php">Ficción</a>
                            <a class="narrable" href="historia.php">Historia</a>
                        </div>
                    </div>
                    </li>
                    <li><a href="novedades.php">Novedades</a></li>
                    <li><a href="conocenos.php">Conócenos</a></li>
                    <?php if (isset($_SESSION['user_name'])): ?>
                        <li><a><span class="narrable">Bienvenido, <?php echo $_SESSION['user_name']; ?></span></a></li>
                    <li>
                        <div class="menu-item">
                            <a class="narrable">
                                <img src="imagenes/sesionimg.png" alt="Sesión" style="width: 24px; height: 24px;">
                                Sesión +
                            </a>
                        <div class="submenu">
                                <a class="narrable" href="cuenta.php">
                                    <img src="imagenes/estrellaimg.png" alt="Estrella" style="width: 24px; height: 24px;">
                                    Cuenta
                                </a>
                                <a class="narrable" href="carrito.php">
                                    <img src="imagenes/carroiimg.png" alt="Carro" style="width: 24px; height: 24px;">
                                    Carro
                                </a>
                                <a class="narrable" href="logout.php"> 
                                    <img src="imagenes/colcerrimg.png" alt="Cerrar" style="width: 24px; height: 24px;">
                                    Cerrar Sesión
                                </a>
                            </div>
                        </div>
                        </li>
                    <?php else: ?>
                        <li><a href="sesion.php">Sesión</a></li>
                    <?php endif; ?>
                    <button class="narrable btn-narrador" id="toggleNarrador">Apagar narrador</button>
                    <button class="narrable btn-narrador" id="darkModeToggle">Modo Noche</button>
                </ul>
            </nav>
        </div>
    </div>
</header>