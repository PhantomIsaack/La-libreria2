<?php
session_start();
include 'conexion.php'; 

if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión para eliminar favoritos.";
    exit();
}

if (isset($_POST['id_producto'])) {
    $id_usuario = $_SESSION['usuario_id'];
    $id_producto = $_POST['id_producto'];

    $sql_delete = "DELETE FROM favoritos WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
    if ($conn->query($sql_delete) === TRUE) {
        echo "Libro eliminado de favoritos.";
    } else {
        echo "Error al eliminar de favoritos: " . $conn->error;
    }
} else {
    echo "ID de producto no proporcionado.";
}
?>
