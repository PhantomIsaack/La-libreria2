<?php 
$indexpage_css = 'estilos/novedades.css';
$indexja_js = 'javajs/novedades.js';
include 'encabezado.php';
include 'conexion.php'; 

$sql = "SELECT titulo, imagen_url, precio FROM productos"; 
$result = $conn->query($sql);
?>

<section class="page-title section-bordered">
    <h1 class="narrable">Novedades</h1>
</section>

<aside class="filter">
    <h3 class="narrable">Filtrar por precio</h3>
    <form id="filter-form">
        <label><input type="checkbox" name="price-filter" value="200-300"><a class="narrable"> $200-$300 MXN </a></label><br>
        <label><input type="checkbox" name="price-filter" value="400-500"><a class="narrable"> $400-$500 MXN </a></label><br>
        <label><input type="checkbox" name="price-filter" value="600-700"><a class="narrable"> $600-$700 MXN </a></label><br>
        <label><input type="checkbox" name="price-filter" value="800-900"><a class="narrable"> $800-$900 MXN </a></label>
    </form>
</aside>


<div class="container-items">
    <?php 
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $titulo = $row['titulo'];
            $imagen = $row['imagen_url'];
            $precio = $row['precio'];
            
            if ($precio >= 200 && $precio <= 300) {
                $priceRange = "200-300";
            } elseif ($precio >= 400 && $precio <= 500) {
                $priceRange = "400-500";
            } elseif ($precio >= 600 && $precio <= 700) {
                $priceRange = "600-700";
            } elseif ($precio >= 800 && $precio <= 900) {
                $priceRange = "800-900";
            } else {
                $priceRange = "otro";
            }

            echo "
            <div class='item book-item' data-price='$priceRange'>
                <figure>
                    <img src='$imagen' alt='Imagen de $titulo'>
                </figure>
                <div class='info-product'>
                    <h2 class='narrable'>$titulo</h2>
                    <p class='narrable price'>$$precio MXN</p>
                    <button class='narrable'>Añadir al carrito</button>
                    <button class='narrable'>Añadir al carrito</button>
                    <button class='narrable'>Añadir al carrito</button>
                    
                </div>
            </div>";
        }
    } else {
        echo "<p>No hay libros disponibles.</p>";
    }

    $conn->close(); 
    ?>
</div>

<script src="javajs/novedades.js"></script>


    <?php include 'footer.php'; ?>