<?php 
$indexpage_css = 'estilos/index.css';
$indexja_js = 'javajs/index.js';
include 'encabezado.php';
?>
<section class="page-title">
    <h1 class="narrable">La libreria</h1>
</section>

<div class="carousel">
  <div class="slides">
    <img src="imagenes/logolib.jpg" class="slide" alt="Logo de la pagina">
    <img src="https://images.unsplash.com/photo-1626618012641-bfbca5a31239?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="slide" alt="Harry Potter y La Orden del Fénix"">
    <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG02OHP.jpg" class="slide" alt=Crepúsculo">
  </div>
  <button class="prev">❮</button>
  <button class="next">❯</button>
  

</div>

<section class="page-title">
    <h1 class="narrable">Libros</h1>
</section>

<div class="container-items">
        <div class="item">
            <figure>
                <img class="narrable" src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG02OHP.jpg" alt="Crepúsculo">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Ebook de Crepúsculo</h2>
                <p  class="narrable price">$409 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://images.cdn3.buscalibre.com/fit-in/360x360/16/fd/16fd128c48ccbc4f6bca70224cfe4b51.jpg" alt="Vida 3.0">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Ebook de Vida 3.0</h2>
                <p class="narrable price">$551.96 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://m.media-amazon.com/images/I/71h9jhxr7vL._AC_UF350,350_QL50_.jpg" alt="Human Compatible">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Ebook de Human Compatible</h2>
                <p class="narrable price">$386.47 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://m.media-amazon.com/images/I/81jZyfNMlXL._SY466_.jpg" alt="Historia Universal: Un recorrido visual a través de los años">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Ebook de Historia Universal</h2>
                <p class="narrable price">$667.50 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
        <div class="item">
            <figure>
                <img src="https://images.unsplash.com/photo-1626618012641-bfbca5a31239?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" alt="Harry Potter y La Orden del Fénix">
            </figure>
            <div class="info-product">
                <h2 class="narrable">Ebook de Harry Potter</h2>
                <p class="narrable price">$324 MXN</p>
                <button class="narrable">Añadir al carrito</button>
            </div>
        </div>
       
</div>

    <script src="javajs/index.js"></script>
    <?php include 'footer.php'; ?>