<?php
$indexpage_css = 'estilos/index.css';
include 'encabezado.php';
include 'conexion.php'; 

if (!isset($_SESSION['usuario_id'])) {
    header("Location: sesion.php"); 
    exit();
}

$user_id = $_SESSION['usuario_id'];
$sql = "SELECT nombre, apellidos, telefono, email FROM usuarios WHERE id_usuario = '$user_id'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "<script>alert('No se encontraron datos del usuario.'); window.location.href='index.php';</script>";
    exit();
}

$sql_favoritos = "SELECT p. * FROM favoritos f JOIN productos p ON f.id_producto = p.id_producto WHERE f.id_usuario = '$user_id'";
$result_favoritos = $conn->query($sql_favoritos);

?>

<section class="page-title section-bordered">
    <h1 class="narrable">Cuenta</h1>
</section>

<p class="narrable"><strong>Nombre:</strong> <?php echo $user['nombre']; ?></p>
<p class="narrable"><strong>Apellido:</strong> <?php echo $user['apellidos']; ?></p>
<p class="narrable"><strong>Teléfono:</strong> <?php echo $user['telefono']; ?></p>
<p class="narrable"><strong>Email:</strong> <?php echo $user['email']; ?></p>

<section class="page-title section-bordered">
    <h1 class="narrable">Favoritos</h1>
</section>

<div class="container-items">
    <?php if ($result_favoritos->num_rows > 0): ?>
        <?php while ($favorito = $result_favoritos->fetch_assoc()): ?>
            <div class="item">
                <figure>
                    <img class="narrable" src="<?php echo $favorito['imagen_url']; ?>" alt="<?php echo $favorito['titulo']; ?>">
                </figure>
                <div class="info-product">
                    <h2 class="narrable"><?php echo $favorito['titulo']; ?></h2>
                    <p class="narrable"><strong>Autor:</strong> <?php echo $favorito['autor']; ?></p>
                    <button class="narrable" onclick="window.location.href='mostrar.php?id=<?php echo $favorito['id_producto']; ?>'">Mostrar más</button>
                    <button class="narrable btn btn-remove-favorite" onclick="removeFromFavorites(<?php echo $favorito['id_producto']; ?>)">Eliminar de Favoritos</button>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="narrable">No tienes libros en tus favoritos.</p>
    <?php endif; ?>
</div>


<script>
function removeFromFavorites(bookId) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "eliminar_favorito.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            alert(xhr.responseText); 
            location.reload(); 
        }
    };
    xhr.send("id_producto=" + bookId);
}
</script>


<?php include 'footer.php'; ?>
