<?php
include 'conexion.php';
session_start();

if (isset($_POST['id_producto'])) {
    $producto_id = $_POST['id_producto'];
    $usuario_id = $_SESSION['usuario_id'];

    $sql = "DELETE FROM carrito WHERE id_usuario = '$usuario_id' AND id_producto = '$producto_id'";

    if ($conn->query($sql) === TRUE) {
        echo "Producto eliminado del carrito.";
    } else {
        echo "Error al eliminar el producto: " . $conn->error;
    }
} else {
    echo "ID del producto no proporcionado.";
}
?>


