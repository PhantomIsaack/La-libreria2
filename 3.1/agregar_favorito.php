<?php
session_start();
include 'conexion.php'; 

if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión para agregar favoritos.";
    exit();
}

if (isset($_POST['id_producto'])) {
    $id_usuario = $_SESSION['usuario_id'];
    $id_producto = $_POST['id_producto'];

    $sql_check = "SELECT * FROM favoritos WHERE id_usuario = '$id_usuario' AND id_producto = '$id_producto'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo "Este libro ya está en tus favoritos.";
    } else {
        $sql_insert = "INSERT INTO favoritos (id_usuario, id_producto) VALUES ('$id_usuario', '$id_producto')";
        if ($conn->query($sql_insert) === TRUE) {
            echo "Libro agregado a favoritos.";
        } else {
            echo "Error al agregar a favoritos: " . $conn->error;
        }
    }
} else {
    echo "ID de producto no proporcionado.";
}
?>

