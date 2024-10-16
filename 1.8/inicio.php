<?php
include 'encabad.php';

session_start(); 

if (!isset($_SESSION['usuario'])) {
    header("Location: admin.php");
    exit; 
}

require 'conexion.php';


$usuarios_sql = "SELECT * FROM usuarios";
$administradores_sql = "SELECT * FROM administradores";
$productos_sql = "SELECT * FROM productos";
$ventas_sql = "SELECT * FROM ventas";

$usuarios_result = $conn->query($usuarios_sql);
$administradores_result = $conn->query($administradores_sql);
$productos_result = $conn->query($productos_sql);
$ventas_result = $conn->query($ventas_sql);
?>
    <main>
        <h2>Bienvenido, <?php echo $_SESSION['usuario']; ?>!</h2>

        <h3>Usuarios</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Apellidos</th>
                <th>Telefono</th>
                <th>Email</th>
                <th>Fecha de registro</th>
            </tr>
            <?php while ($row = $usuarios_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['apellidos']; ?></td>
                <td><?php echo $row['telefono']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['fecha_registro']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Administradores</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de registro</th>
            </tr>
            <?php while ($row = $administradores_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id_admin']; ?></td>
                <td><?php echo $row['nombre']; ?></td>
                <td><?php echo $row['email']; ?></td>
                <td><?php echo $row['fecha_registro']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Productos</h3>
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
            </tr>
            <?php endwhile; ?>
        </table>

        <h3>Ventas</h3>
        <table>
            <tr>
                <th>ID</th>
                <th>ID Producto</th>
                <th>ID Usuario</th>
                <th>Fecha</th>
            </tr>
            <?php while ($row = $ventas_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['id_producto']; ?></td>
                <td><?php echo $row['id_usuario']; ?></td>
                <td><?php echo $row['fecha']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>

    </main>
</body>
</html>
