<?php 
$indexpage_css = 'estilos/novedades.css';
$indexja_js = 'javajs/novedades.js';
include 'encabezado.php';
?>

<section class="page-title section-bordered">
    <h1 class="narrable">Novedades</h1>
</section>

<aside class="filter">
        <h3 class="narrable">Filtrar por precio</h3>
        <form id="filter-form">
            <label><input type="checkbox" value="$200-$300 MXN"><a class="narrable"> $200-$300 MXN </a></label><br>
            <label><input type="checkbox" value="$400-$500 MXN"><a class="narrable"> $400-$500 MXN </a></label><br>
            <label><input type="checkbox" value="$600-$700 MXN"><a class="narrable"> $600-$700 MXN </a></label><br>
            <label><input type="checkbox" value="$800-$900 MXN"><a class="narrable"> $800-$900 MXN </a></label>
        </form>
</aside>

    <!-- Contenedor de productos -->
<div class="container-items">
        <!-- Libro 1 -->                    
        <div class="item book-item" data-price="$200-$300 MXN">
            <figure>
                <img src="https://imagessl8.casadellibro.com/a/l/s7/68/9788408291268.webp" alt="Libro 1">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Libro Ejemplo 1</h2>
                <p class="narrable price">$250 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        
        <!-- Libro 2 -->
        <div class="item book-item" data-price="$200-$300 MXN">
            <figure>
                <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG02OHP.jpg" alt="Libro 2">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Libro Ejemplo 2</h2>
                <p class="narrable price">$275 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <!-- Libro 3 -->
        <div class="item book-item" data-price="$400-$500 MXN">
            <figure>
                <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG0346S.jpg" alt="Libro 3">
            </figure>
            <div class="info-product">
                <h2 class="narrable" >Libro Ejemplo 3</h2>
                <p class="narrable price">$450 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <!-- Libro 4 -->
        <div class="item book-item" data-price="$400-$500 MXN">
            <figure>
                <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG0351W.jpg" alt="Libro 4">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Libro Ejemplo 4</h2>
                <p class="narrable price">$490 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <!-- Libro 5 -->
        <div class="item book-item" data-price="$600-$700 MXN">
            <figure>
                <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG034GN.jpg" alt="Libro 5">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Libro Ejemplo 5</h2>
                <p class="narrable price">$650 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <!-- Libro 6 -->
        <div class="item book-item" data-price="$600-$700 MXN">
            <figure>
                <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG02OHP.jpg" alt="Libro 6">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Libro Ejemplo 6</h2>
                <p class="narrable price">$690 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <!-- Libro 7 -->
        <div class="item book-item" data-price="$800-$900 MXN">
            <figure>
                <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG034PG.jpg" alt="Libro 7">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Libro Ejemplo 7</h2>
                <p class=" narrable price">$850 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <!-- Libro 8 -->
        <div class="item book-item" data-price="$800-$900 MXN">
            <figure>
                <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG034R9.jpg" alt="Libro 8">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Libro Ejemplo 8</h2>
                <p class="narrable price">$890 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
</div>

    <?php include 'footer.php'; ?>