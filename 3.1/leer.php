
<?php
$indexpage_css = 'estilos/mostrar.css';
include 'encabezado.php';
include 'conexion.php'; 

if (isset($_GET['id'])) {
    $book_id = $_GET['id'];

    $sql = "SELECT * FROM productos WHERE id_producto = $book_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $book = $result->fetch_assoc();
    } else {
        echo "Libro no encontrado.";
        exit();
    }
} else {
    echo "ID de libro no proporcionado.";
    exit();
}
?>

<section class="page-title section-bordered">
    <h1 class="narrable"><?php echo $book['titulo']; ?></h1>
</section>

<section class="book-details">
    <figure>
        <img class="narrable" src="<?php echo $book['imagen_url']; ?>" alt="<?php echo $book['titulo']; ?>">
   </figure>
    <h1 class="narrable"><?php echo $book['titulo']; ?></h1> 
    <p class="narrable"><strong>Autor:</strong> <?php echo $book['autor']; ?></p>
    <p class="narrable"><strong>Fecha de publicación:</strong> <?php echo $book['fecha_publicacion']; ?></p>
    <p class="narrable"><strong>Precio:</strong> <?php echo $book['precio']; ?> MXN</strong></p>
    <p class="narrable"><strong>Categoría:</strong> <?php echo $book['categoria']; ?></p>
    <p class="narrable"><strong>Contenido:</strong> <?php echo $book['descripcion']; ?></p>

</section>