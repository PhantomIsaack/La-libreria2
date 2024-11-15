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
    <img src="imagenes/bor.png" class="slide" alt="Bordelans">
    <img src="imagenes/mon.jpg" class="slide" alt="Plantilla">
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
                <button class="narrable btn btn-favorite" onclick="addToFavorites(<?php echo $row['id_producto']?>)">Agregar a Favoritos</button>

            </div>
        </div>
    <?php endwhile; ?>
</div>

<script>
function addToFavorites(bookId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "agregar_favorito.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
        }
    };
    xhr.send("id_producto=" + bookId);
}
</script>

<script>
function addToCart(bookId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "agregar_carrito.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText);
        }
    };
    xhr.send("id_producto=" + bookId);
}
</script>

    <script src="javajs/index.js"></script>
    <?php include 'footer.php'; ?>