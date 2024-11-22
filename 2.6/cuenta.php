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

if (isset($_POST['action']) && $_POST['action'] === "change_password") {
    $user_id = $_SESSION['usuario_id'];
    $currentPassword = $_POST['currentPassword'];
    $newPassword = $_POST['newPassword'];
  
    $query = "SELECT password FROM usuarios WHERE id_usuario='$user_id'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row && $currentPassword === $row['password']) {
        $updateQuery = "UPDATE usuarios SET password='$newPassword' WHERE id_usuario='$user_id'";
        $updateResult = mysqli_query($conn, $updateQuery);

        if ($updateResult) {
            echo "<script>alert('¡Contraseña cambiada exitosamente!');</script>";
        } else {
            echo "<script>alert('Error al cambiar la contraseña.');</script>";
        }
    } else {
        echo "<script>alert('Contraseña actual incorrecta.');</script>";
    }
}
$sql_compras = "
    SELECT p.*
    FROM detalle_venta dv
    JOIN productos p ON dv.id_producto = p.id_producto
    JOIN ventas v ON dv.id_venta = v.id_venta
    WHERE v.id_usuario = '$user_id'";
    

$sql_favoritos = "SELECT p. * FROM favoritos f JOIN productos p ON f.id_producto = p.id_producto WHERE f.id_usuario = '$user_id'";
$result_favoritos = $conn->query($sql_favoritos);
$result_compras = $conn->query($sql_compras);

?>

<section class="page-title section-bordered">
    <h1 class="narrable">Cuenta</h1>
</section>

<div class="user-info">
    <p><strong>Nombre:</strong> <?php echo $user['nombre']; ?></p>
    <p><strong>Apellido:</strong> <?php echo $user['apellidos']; ?></p>
    <p><strong>Teléfono:</strong> <?php echo $user['telefono']; ?></p>
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
</div>


<section class="page-title section-bordered">
    <h1 class="narrable">Cambiar contraseña</h1>
</section>

<div class="password-form">
    <form action="cuenta.php" method="POST">
        <input type="hidden" name="action" value="change_password">

        <label for="currentPassword">Contraseña Actual:</label>
        <input type="password" id="currentPassword" name="currentPassword" required>

        <label for="newPassword">Nueva Contraseña:</label>
        <input type="password" id="newPassword" name="newPassword" required>

        <input type="submit" value="Cambiar Contraseña">
    </form>
</div>


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

<section class="page-title section-bordered">
    <h1 class="narrable">Libros adquiridos</h1>
</section>

<div class="container-items">
    <?php if ($result_compras->num_rows > 0): ?>
        <?php while ($compra = $result_compras->fetch_assoc()): ?>
            <div class="item">
                <figure>
                    <img class="narrable" src="<?php echo $compra['imagen_url']; ?>" alt="<?php echo $compra['titulo']; ?>">
                </figure>
                <div class="info-product">
                    <h2 class="narrable"><?php echo $compra['titulo']; ?></h2>
                    <p class="narrable"><strong>Autor:</strong> <?php echo $compra['autor']; ?></p>
                    <button class="narrable btn" onclick="window.location.href='leer.php?id=<?php echo $compra['id_producto']; ?>'">Leer</button>
                </div>
            </div>
        <?php endwhile; ?>
    <?php else: ?>
        <p class="narrable">No has comprado ningún libro todavía.</p>
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
