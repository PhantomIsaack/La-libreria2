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
    $delete_sql = "DELETE FROM ventas WHERE id_venta = $id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "<script>alert('Venta eliminado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error eliminando Venta: $error_msg');</script>";
    }
}

if (isset($_POST['edit_venta'])) {
    $id = $_POST['venta_id'];
    $id_usuario = $_POST['id_usuario'];
    $total = $_POST['total'];
    $fecha_venta = $_POST['fecha_venta'];

    $edit_sql = "UPDATE ventas SET id_usuario = '$id_usuario', total = '$total', fecha_venta = '$fecha_venta' WHERE id_venta = $id ";
    if ($conn->query($edit_sql) === TRUE) {
        echo "<script>alert('Venta editada correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error editando venta:  $error_msg');</script>";
    }
}

if (isset($_POST['add_venta'])) {
    $id_usuario = $_POST['id_usuario'];
    $total = $_POST['total'];
    $fecha_venta = $_POST['fecha_venta'];

    $add_sql = "INSERT INTO ventas (id_usuario, total, fecha_venta) VALUES ('$id_usuario', '$total', '$fecha_venta')";
    if ($conn->query($add_sql) === TRUE) {
        echo "<script>alert('Venta agregada correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error agregando Venta: $error_msg');</script>";
    }
}

$ventas_sql = "SELECT * FROM ventas";
$ventas_result = $conn->query($ventas_sql);
?>

<main>
<h2>Agregar nueva venta</h2>
<div class="container">
        <form action="ventas.php" method="POST">
            <div class="form-group">
                <label for="id_usuario">Id del usuario: </label>
                <input type="number" id="id_usuario" name="id_usuario" placeholder="id del usuario" required>
            </div>
            <div class="form-group">
                <label for="total">Total: </label>
                <input type="number" id="total" name="total" placeholder="Total de la venta" required>
            </div>
            <div class="form-group">
                <label for="fecha_venta">Fecha de la venta:</label>
                <input type="date" id="fecha_venta" name="fecha_venta" required>
            </div>
            <button type="submit" name="add_venta" class="btn-submit">Agregar venta</button>
        </form>
    </div>

    <h2>Ventas actuales</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>ID del usuario</th>
                <th>Total</th>
                <th>Fecha</th>
                <th>Acciones</th>
            </tr>
            <?php while ($row = $ventas_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_venta']; ?></td>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['total']; ?></td>
                <td><?php echo $row['fecha_venta']; ?></td>
                <td>
                    <a href="ventas.php?delete_id=<?php echo $row['id_venta']; ?>" onclick="return confirm('¿Estás seguro de eliminar esta venta?')" class="btn-delete">Eliminar</a>
                    <button onclick="document.getElementById('editForm-<?php echo $row['id_venta']; ?>').style.display='block'" class="btn-edit">Editar</button>
                </td>
            </tr>

            <tr id="editForm-<?php echo $row['id_venta']; ?>" style="display: none;">
                <td colspan="9">
                    <form action="ventas.php" method="POST">
                        <input type="hidden" name="venta_id" value="<?php echo $row['id_venta']; ?>">
                        <input type="number" name="id_usuario" value="<?php echo $row['id_usuario']; ?>" required>
                        <input type="number" name="total" value="<?php echo $row['total']; ?>" required>
                        <input type="date" name="fecha_venta" value="<?php echo $row['fecha_venta']; ?>" required>
                        <button type="submit" name="edit_venta" class="btn-submit">Guardar cambios</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>


</main>
</body>
</html>