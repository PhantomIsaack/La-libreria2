<?php
include 'conexion.php';
session_start();
if (!isset($_SESSION['usuario_id'])) {
    echo "Debes iniciar sesión para agregar cosas a tu carrito.";
    exit();
}

if (isset($_POST['id_producto'])) {
    $producto_id = $_POST['id_producto'];
    $usuario_id = $_SESSION['usuario_id'];

    $sql_check = "SELECT * FROM carrito WHERE id_usuario = '$usuario_id' AND id_producto = '$producto_id'";
    $result_check = $conn->query($sql_check);

    if ($result_check->num_rows > 0) {
        echo 'Este producto ya está en tu carrito.'; 
    } else {
        $sql_insert = "INSERT INTO carrito (id_usuario, id_producto) VALUES ('$usuario_id', '$producto_id')";

        if ($conn->query($sql_insert) === TRUE) {
            echo 'Producto agregado al carrito.'; 
        } else {
            echo 'Error al agregar el producto: ' . $conn->error; 
        }
    }
} else {
    echo 'ID de producto no proporcionado.'; 
}
?>


