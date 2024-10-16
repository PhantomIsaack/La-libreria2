<?php 
$indexpage_css = 'estilos/index.css';
$indexja_js = 'javajs/index.js';
include 'encabezado.php';

require 'conexion.php';

$productos_sql = "SELECT * FROM productos";
$productos_result = $conn->query($productos_sql);

?>
<section class="page-title">
    <h1 class="narrable">La libreria</h1>
</section>

<div class="carousel">
  <div class="slides">
    <img src="imagenes/logolib.jpg" class="slide" alt="Logo de la pagina">
    <img src="https://images.unsplash.com/photo-1626618012641-bfbca5a31239?q=80&w=1964&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="slide" alt="Harry Potter y La Orden del Fénix">
    <img src="https://www.polifemo.com/static/img/portadas/_visd_0000JPG02OHP.jpg" class="slide" alt="Crepúsculo">
  </div>
  <button class="prev">❮</button>
  <button class="next">❯</button>
</div>

<section class="page-title">
    <h1 class="narrable">Libros</h1>
</section>

<div class="container-items">
    <?php while ($row = $productos_result->fetch_assoc()): ?>
        <div class="item">
            <figure>
                <img class="narrable" src="<?php echo $row['imagen_url']; ?>" alt="<?php echo $row['titulo']; ?>">
            </figure>
            <div class="info-product">
                <h2 class="narrable"><?php echo $row['titulo']; ?></h2>
                <p class="narrable price">$<?php echo $row['precio']; ?> MXN</p>
                <button class="narrable" onclick="window.location.href='mostrar.php?id=<?php echo $row['id_producto']; ?>'">Mostrar más</button>
                <button class="narrable btn_car" onclick="addToCart(<?php echo $row['id_producto']; ?>)">Añadir al carrito</button>
                <button class="narrable btn_fav">Favoritos</button>
            </div>
        </div>
    <?php endwhile; ?>
</div>

    <script src="javajs/index.js"></script>
    <?php include 'footer.php'; ?>