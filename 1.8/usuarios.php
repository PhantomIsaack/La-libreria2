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
    $delete_sql = "DELETE FROM usuarios WHERE id_usuario = $id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Usuario eliminado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error eliminando Usuario: $error_msg');</script>";
    }
}


if (isset($_POST['edit_usuario'])) {
    $id = $_POST['usuario_id'];
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $edit_sql = "UPDATE usuarios SET nombre = '$nombre', apellidos = '$apellidos', telefono = '$telefono', email = '$email', password = '$password' WHERE id_usuario = $id ";
    if ($conn->query($edit_sql) === TRUE) {
        echo "<script>alert('Usuario editado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error editando Usuario:  $error_msg');</script>";
    }
}


if (isset($_POST['add_usuario'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $add_sql = "INSERT INTO usuarios (nombre, apellidos, telefono, email, password) VALUES ('$nombre', '$apellidos', '$telefono', '$email', $password)";
    if ($conn->query($add_sql) === TRUE) {
        echo "<script>alert('Usuario agregado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error agregando Usuario: $error_msg');</script>";
    }
}


$usuarios_sql = "SELECT * FROM usuarios";
$usuarios_result = $conn->query($usuarios_sql);
?>

<main>
<h2>Agregar nuevo Ususario</h2>
    <div class="container">
        <form action="usuarios.php" method="POST">
            <div class="form-group">
                <label for="nombre">Nombres: </label>
                <input type="text" id="nombre" name="nombre" placeholder="Nombre del usuario" required>
            </div>
            <div class="form-group">
                <label for="apellidos">Apellidos: </label>
                <input type="text" id="apellidos" name="apellidos" placeholder="Apellido del usuario" required>
            </div>
            <div class="form-group">
                <label for="telefono">Telefono: </label>
                <input type="number" id="telefono" name="telefono" placeholder="Telefono del usuario" required>
            </div>
            <div class="form-group">
                <label for="correo">Corro electronico: </label>
                <input type="email" id="email" name="email" placeholder="Correo del usuario" required>
            </div>
            <div class="form-group">
                <label for="contra">Contraseña: </label>
                <input type="password" id="password" name="password" placeholder="Contraseña del usuario" required>
            </div>
            <button type="submit" name="add_usuario" class="btn-submit">Agregar Usuario</button>
        </form>
    </div>

        <h2>Usuarios actuales</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Contraseña</th>
                <th>Fecha de registro</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $usuarios_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['password']; ?></td>
                <td><?php echo $row['fecha_registro']; ?></td>
                 <td>
                    <a href="usuarios.php?delete_id=<?php echo $row['id_usuario']; ?>" onclick="return confirm('¿Estás seguro de eliminar este usuario?')" class="btn-delete">Eliminar</a>
                    <button onclick="document.getElementById('editForm-<?php echo $row['id_usuario']; ?>').style.display='block'" class="btn-edit">Editar</button>
                </td>
            </tr>
            <tr id="editForm-<?php echo $row['id_usuario']; ?>" style="display: none;">
                <td colspan="9">
                    <form action="usuarios.php" method="POST">
                        <input type="hidden" name="usuario_id" value="<?php echo $row['id_usuario']; ?>">
                        <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>" required>
                        <input type="text" name="apellidos" value="<?php echo $row['apellidos']; ?>" required>
                        <input type="number" name="telefono" value="<?php echo $row['telefono']; ?>" required>
                        <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
                        <input type="password" name="password" value="<?php echo $row['password']; ?>" required>
                        <button type="submit" name="edit_usuario" class="btn-submit">Guardar cambios</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
</main>
</body>
</html>