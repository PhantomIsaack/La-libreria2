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
    <div class="logo">
        <a class="narrable" href="index.php">
            <img src="imagenes/logolib.jpg" alt="Logo de la página" class="logo-img"> 
            La librería
        </a>
    </div>
    <nav>
        <div class="menu-item">
            <a class="narrable">Imprescindibles</a>
            <div class="submenu">
                <a class="narrable" href="novedades.php">Novedades</a>
                <a class="narrable" href="recomendados.php">Recomendados</a>
            </div>
        </div>

        <div class="menu-item">
            <a class="narrable">Libros</a>
            <div class="submenu">
                <a class="narrable" href="ciencia-tecnologia.php">Ciencia y Tecnología</a>
                <a class="narrable" href="estilo-vida.php">Ficción</a>
                <a class="narrable" href="historia.php">Historia</a>
            </div>
        </div>

        <a class="narrable" href="conocenos.php">Conócenos</a>
        <a class="narrable" href="index.php">Inicio</a>
        <button class="narrable btn-narrador" id="toggleNarrador">Apagar narrador</button>
    
    </nav>

    <?php if (isset($_SESSION['user_name'])): ?>
        <span class="narrable">Bienvenido, <?php echo $_SESSION['user_name']; ?></span>
        <nav>
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
        </nav>
    <?php else: ?>
        <a class="narrable" href="sesion.php">
            <img src="imagenes/sesionimg.png" alt="Sesión" style="width: 24px; height: 24px;">
            Sesión
        </a>
    <?php endif; ?>

    <button class="narrable" id="darkModeToggle">Modo Noche</button>
</header>

            
