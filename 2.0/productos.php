<?php
$iniciopage_css = 'estilos/productos.css';
include 'encabad.php';

session_start(); 

if (!isset($_SESSION['usuario'])) {
    header("Location: admin.php");
    exit; 
}

require 'conexion.php';


if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM productos WHERE id_producto = $id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Producto eliminado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error eliminando producto: $error_msg');</script>";
    }
}


if (isset($_POST['edit_product'])) {
    $id = $_POST['product_id'];
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $autor = $_POST['autor'];
    $descripcion = $_POST['descripcion'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $categoria = $_POST['categoria'];
    $imagen_url = $_POST['imagen_url'];

    $edit_sql = "UPDATE productos SET titulo = '$titulo', precio = '$precio', autor = '$autor', descripcion = '$descripcion', fecha_publicacion = '$fecha_publicacion', categoria = '$categoria', imagen_url = '$imagen_url' WHERE id_producto = $id ";
    if ($conn->query($edit_sql) === TRUE) {
        echo "<script>alert('Producto editado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error editando producto:  $error_msg');</script>";
    }
}


if (isset($_POST['add_product'])) {
    $titulo = $_POST['titulo'];
    $precio = $_POST['precio'];
    $autor = $_POST['autor'];
    $descripcion = $_POST['descripcion'];
    $fecha_publicacion = $_POST['fecha_publicacion'];
    $categoria = $_POST['categoria'];
    $imagen_url = $_POST['imagen_url'];

    $add_sql = "INSERT INTO productos (titulo, precio, autor, descripcion, fecha_publicacion, categoria, imagen_url) VALUES ('$titulo', '$precio', '$autor', '$descripcion', '$fecha_publicacion', '$categoria', '$imagen_url')";
    if ($conn->query($add_sql) === TRUE) {
        echo "<script>alert('Producto agregado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error agregando producto: $error_msg');</script>";
    }
}


$productos_sql = "SELECT * FROM productos";
$productos_result = $conn->query($productos_sql);
?>

<main>
<h2>Agregar nuevo Producto</h2>
    <div class="container">
        <form action="productos.php" method="POST">
            <div class="form-group">
                <label for="titulo">Título del producto:</label>
                <input type="text" id="titulo" name="titulo" placeholder="Título del producto" required>
            </div>
            <div class="form-group">
                <label for="precio">Precio del producto:</label>
                <input type="number" id="precio" name="precio" placeholder="Precio del producto" required>
            </div>
            <div class="form-group">
                <label for="autor">Autor:</label>
                <input type="text" id="autor" name="autor" placeholder="Autor" required>
            </div>
            <div class="form-group">
                <label for="descripcion">Descripción:</label>
                <textarea id="descripcion" name="descripcion" placeholder="Descripción" required cols="30" rows="5"></textarea>
            </div>
            <div class="form-group">
                <label for="fecha_publicacion">Fecha de publicación:</label>
                <input type="date" id="fecha_publicacion" name="fecha_publicacion" required>
            </div>
            <div class="form-group">
                <label for="categoria">Categoría:</label>
                <select id="categoria" name="categoria" required>
                    <option value="" disabled selected>Selecciona una categoría</option>
                    <option value="Ficcion">Ficción</option>
                    <option value="Ciencia y Tecnologia">Ciencia y Tecnología</option>
                    <option value="Historia">Historia</option>
                </select>
            </div>
            <div class="form-group">
                <label for="imagen_url">URL de la imagen:</label>
                <input type="text" id="imagen_url" name="imagen_url" placeholder="URL de la imagen" required>
            </div>
            <button type="submit" name="add_product" class="btn-submit">Agregar Producto</button>
        </form>
    </div>




        <h2>Productos actuales</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Autor</th>
                <th>Descripción</th>
                <th>Fecha de Publicación</th>
                <th>Categoría</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $productos_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_producto']; ?></td>
                <td><?php echo $row['titulo']; ?></td>
                <td><?php echo $row['precio']; ?></td>
                <td><?php echo $row['autor']; ?></td>
                <td><?php echo $row['descripcion']; ?></td>
                <td><?php echo $row['fecha_publicacion']; ?></td>
                <td><?php echo $row['categoria']; ?></td>
                <td><img src="<?php echo $row['imagen_url']; ?>" alt="Imagen del producto" style="width:50px;height:50px;"></td>
                <td>
                    <a href="productos.php?delete_id=<?php echo $row['id_producto']; ?>" onclick="return confirm('¿Estás seguro de eliminar este producto?')" class="btn-delete">Eliminar</a>
                    <button onclick="document.getElementById('editForm-<?php echo $row['id_producto']; ?>').style.display='block'" class="btn-edit">Editar</button>
                </td>
            </tr>

            <tr id="editForm-<?php echo $row['id_producto']; ?>" style="display: none;">
                <td colspan="9">
                    <form action="productos.php" method="POST">
                        <input type="hidden" name="product_id" value="<?php echo $row['id_producto']; ?>">
                        <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>" required>
                        <input type="number" name="precio" value="<?php echo $row['precio']; ?>" required>
                        <input type="text" name="autor" value="<?php echo $row['autor']; ?>" required>
                        <textarea name="descripcion" required><?php echo $row['descripcion']; ?></textarea>
                        <input type="date" name="fecha_publicacion" value="<?php echo $row['fecha_publicacion']; ?>" required>
                        <input type="text" name="categoria" value="<?php echo $row['categoria']; ?>" required>
                        <input type="text" name="imagen_url" value="<?php echo $row['imagen_url']; ?>" required>
                        <button type="submit" name="edit_product" class="btn-submit">Guardar cambios</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
</main>
</body>
</html>
