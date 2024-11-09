<?php 
$indexpage_css = 'estilos/novedades.css';
$indexja_js = 'javajs/novedades.js';
include 'encabezado.php';
include 'conexion.php'; 

$sql = "SELECT id_producto, titulo, imagen_url, precio FROM productos where categoria = 'Ficción'"; 
$result = $conn->query($sql);
?>
<section class="page-title section-bordered">
    <h1 class="narrable">Ficción</h1>
</section>


<aside class="filter">
    <h3 class="narrable">Filtrar por precio</h3>
    <form id="filter-form">
        <label><input type="checkbox" name="price-filter" value="200-399"><a class="narrable"> $200-$399 MXN </a></label><br>
        <label><input type="checkbox" name="price-filter" value="400-599"><a class="narrable"> $400-$599 MXN </a></label><br>
        <label><input type="checkbox" name="price-filter" value="600-799"><a class="narrable"> $600-$799 MXN </a></label><br>
        <label><input type="checkbox" name="price-filter" value="800-999"><a class="narrable"> $800-$999+ MXN </a></label>
    </form>
</aside>

<div class="container-items">
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $titulo = $row['titulo'];
            $precio = $row['precio'];
            $imagen = $row['imagen_url'];
            $idProducto = $row['id_producto'];
            echo "
            <div class='item book-item' data-price='$precio'>
                <figure>
                    <img src='$imagen' alt='Imagen de $titulo'>
                </figure>
                <div class='info-product'>
                    <h2 class='narrable'>$titulo</h2>
                    <p class='narrable price'>$$precio MXN</p>
                    <button class='narrable' onclick=\"window.location.href='mostrar.php?id=$idProducto'\">Mostrar más</button>
                    <button class='narrable btn btn-favorite' onclick='addToCart($idProducto)'>Añadir al carrito</button>
                    <button class='narrable btn btn-favorite' onclick='addToFavorites($idProducto)'>Favoritos</button>
                </div>
            </div>";

            
        }
    } else {
        echo "<p>No hay productos disponibles.</p>";
    }
    ?>
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


<script src="javajs/novedades.js"></script>

<?php include 'footer.php'; ?>