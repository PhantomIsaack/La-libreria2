<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Apartado para los links-->

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

    <!-- fin del Apartado -->
</head>

<body>
<header>
    <div class="logo">
        <a class="narrable" href="index.php">
        <img src="imagenes/logolib.jpg" alt="Logo de la pagina" class="logo-img"> 
        La librería
        </a>
    </div>
    <nav>
        <div class="menu-item">
            <a class="narrable">Imprescindibles</a>
            <div class="submenu">
                <a class="narrable" href="novedades.php">Novedades</a>
                <a class="narrable" href="masleidos.php">Más Leídos</a>
                <a class="narrable" href="recomendados.php">Recomendados</a>
            </div>
        </div>

        <div class="menu-item">
            <a class="narrable">Libros</a>
            <div class="submenu">
                <a class="narrable" href="ciencia-tecnologia.php">Ciencia y Tecnología</a>
                <a class="narrable" href="estilo-vida.php">Estilo de vida</a>
                <a class="narrable" href="historia.php">Historia</a>
            </div>
        </div>

        <a class="narrable" href="conocenos.php">Conócenos</a>
        <a class="narrable" href="index.php">Inicio</a>
        <button class="narrable btn-narrador" id="toggleNarrador">Apagar narrador</button>

    </nav>

    <div class="header-icons">
        <a class="narrable siub" href="sesion.php">Sesión<svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M218.87-260.67q63.04-44.05 126.49-67.31 63.45-23.26 134.79-23.26 71.34 0 134.98 23.45 63.64 23.44 128 67.12 42.52-55.53 59.64-107.92 17.12-52.39 17.12-111.41 0-144.62-97.62-242.26-97.62-97.63-242.23-97.63-144.61 0-242.27 97.63-97.66 97.64-97.66 242.26 0 59.24 17.51 111.45 17.5 52.22 61.25 107.88Zm260.98-179.24q-61.93 0-104.31-42.55-42.39-42.55-42.39-104.33t42.53-104.3q42.53-42.52 104.47-42.52 61.93 0 104.31 42.67 42.39 42.67 42.39 104.44 0 61.78-42.53 104.18-42.53 42.41-104.47 42.41Zm.48 377.11q-85.81 0-161.44-32.72-75.62-32.71-132.9-90.25-57.28-57.55-90.23-132.92-32.96-75.37-32.96-162.1 0-84.21 33.21-159.98 33.22-75.77 90.21-133.34 56.99-57.56 132.41-90.44 75.42-32.88 162.16-32.88 84.21 0 159.98 33.33t133.1 90.35q57.33 57.03 90.45 132.86 33.11 75.83 33.11 160.56 0 85.81-32.88 161.46-32.88 75.66-90.44 132.65-57.57 56.99-133.31 90.21Q565.06-62.8 480.33-62.8Zm-.33-77.31q53.24 0 103.54-14.64 50.31-14.64 102.31-54.4-51.59-35.21-103.1-52.75-51.51-17.53-102.75-17.53t-102.42 17.52q-51.19 17.52-102.19 53.06 51 39.07 101.19 53.9 50.18 14.84 103.42 14.84Zm0-371.85q32.49 0 53.65-21.02Q554.8-554 554.8-586.64t-21.15-53.78q-21.16-21.15-53.65-21.15-32.49 0-53.65 21.15-21.15 21.14-21.15 53.78t21.15 53.66q21.16 21.02 53.65 21.02Zm0-74.8Zm.24 376.61Z"/></svg></a>
        <a class="narrable siub" href="carrito.php">Carro<svg xmlns="http://www.w3.org/2000/svg" height="48px" viewBox="0 -960 960 960" width="48px" fill="#FFFFFF"><path d="M280.4-71.24q-31.58 0-53.84-22.49-22.26-22.49-22.26-54.06 0-31.58 22.49-53.84 22.49-22.26 54.07-22.26 31.58 0 53.84 22.49 22.26 22.48 22.26 54.06 0 31.58-22.49 53.84-22.49 22.26-54.07 22.26Zm408.52 0q-31.68 0-53.82-22.49t-22.14-54.06q0-31.58 22.42-53.84 22.42-22.26 53.91-22.26 31.8 0 53.94 22.49 22.14 22.48 22.14 54.06 0 31.58-22.39 53.84-22.39 22.26-54.06 22.26Zm-450.9-667.89 104.65 216.3H632l118.17-216.3H238.02Zm-36.95-74.44h601.31q25.33 0 38.82 23.64 13.5 23.63.3 47.5L703.45-494.47q-11.31 20.17-30.68 33.25-19.36 13.07-42.85 13.07H324.3l-50 92.95h494.46v74.44H270.63q-46.72 0-66.58-31.86-19.85-31.86.62-70.34l62-115.04-150.56-320.13H34.87v-74.44h129.2l37 79Zm141.6 290.74H632 342.67Z"/></svg></a>
        <button id="darkModeToggle">Modo Noche</button>

    </div>

</header>


            
