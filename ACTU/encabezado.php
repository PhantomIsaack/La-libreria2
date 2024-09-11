<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Apartado para los links-->

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>La librería</title>
    <link rel="stylesheet" href="estilos/encab.css">
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

    <!-- fin del Apartado -->
</head>

<body>
<header>
    <div class="logo">
        <a class="narrable" href="index.php">La librería</a>
    </div>
    <nav>
        <div class="menu-item">
            <a class="narrable">Imprescindibles</a>
            <div class="submenu">
                <a class="narrable" href="novedades.php">Novedades</a>
                <a class="narrable" href="mas-leidos.html">Más Leídos</a>
                <a class="narrable" href="recomendados.html">Recomendados</a>
            </div>
        </div>

        <div class="menu-item">
            <a class="narrable">Libros</a>
            <div class="submenu">
                <a class="narrable" href="ciencia-tecnologia.html">Ciencia y Tecnología</a>
                <a class="narrable" href="estilo-vida.html">Estilo de vida</a>
                <a class="narrable" href="historia.html">Historia</a>
            </div>
        </div>

        <a class="narrable" href="conocenos.html">Conócenos</a>
        <a class="narrable" href="index.php">Inicio</a>
        <button class="narrable" id="toggleNarrador">Apagar narrador</button>
    </nav>

    <div class="icons">
        <a class="narrable" href="ses.html" class="icon-user"> Incio 👤 </a>
    </div>
    <div class="icons">
        <a class="narrable"  href="carrito.html"> Carrito 🛒 </a>
    </div>
    <div class="icons">
    <button class="narrable" id="darkModeToggle">🌙</button>
    </div>

</header>
            
