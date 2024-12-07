<?php
$iniciopage_css = 'estilos/productos.css';
$indexja_js = 'javajs/encab.js';
include 'encabad.php';

session_start(); 

if (!isset($_SESSION['usuario'])) {
    header("Location: admin.php");
    exit; 
}

require 'conexion.php';

if (isset($_GET['delete_id'])) {
    $id = $_GET['delete_id'];
    $delete_sql = "DELETE FROM administradores WHERE id_admin = $id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Administrador eliminado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error eliminando Administrador: $error_msg');</script>";
    }
}


if (isset($_POST['edit_adminis'])) {
    $id = $_POST['admin_id'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $edit_sql = "UPDATE administradores SET nombre = '$nombre',  email = '$email', password = '$password' WHERE id_admin = $id ";
    if ($conn->query($edit_sql) === TRUE) {
        echo "<script>alert('Administrador editado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error editando Administrador:  $error_msg');</script>";
    }
}


if (isset($_POST['add_adminis'])) {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $add_sql = "INSERT INTO administradores (nombre, email, password) VALUES ('$nombre', '$email', $password)";
    if ($conn->query($add_sql) === TRUE) {
        echo "<script>alert('Administrador agregado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error agregando a un Administrador: $error_msg');</script>";
    }
}


$administradores_sql = "SELECT * FROM administradores";
$administradores_result = $conn->query($administradores_sql);

?>


<main>
<h2>Agregar nuevo Administrador</h2>
    <div class="container">
        <form action="administradores.php" method="POST">
            <div class="form-group">
                <label for="titulo">Nombre: </label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del administrador" class="input-text" required>
            </div>
            <div class="form-group">
                <label for="precio">Corro electronico: </label>
                <input type="email" id="email" name="email" placeholder="Correo del administrador" required>
            </div>
            <div class="form-group">
                <label for="precio">Contraseña: </label>
                <input type="password" id="password" name="password" placeholder="Contraseña del administrador" required>
            </div>
            <button type="submit" name="add_adminis" class="btn-submit">Agregar Administrador</button>
        </form>
    </div>

        <h2>Administradores actuales</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de registro</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $administradores_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_admin']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['fecha_registro']; ?></td>
                 <td>
                    <a href="administradores.php?delete_id=<?php echo $row['id_admin']; ?>" onclick="return confirm('¿Estás seguro de eliminar este administrador?')" class="btn-delete">Eliminar</a>
                    <button onclick="document.getElementById('editForm-<?php echo $row['id_admin']; ?>').style.display='block'" class="btn-edit">Editar</button>
                </td>
            </tr>
            <tr id="editForm-<?php echo $row['id_admin']; ?>" style="display: none;">
                <td colspan="9">
                    <form action="administradores.php" method="POST">
                        <input type="hidden" name="admin_id" value="<?php echo $row['id_admin']; ?>">
                        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" class="input-text" required>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                        <button type="submit" name="edit_adminis" class="btn-submit">Guardar cambios</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
</main>

<script src="javajs/admca.js"></script>

</body>
</html>