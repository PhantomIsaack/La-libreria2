<?php
// confirmar.php
require 'conexion.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Verificar si el token existe en la base de datos
    $check_sql = "SELECT * FROM usuarios WHERE token = ?";
    $stmt = $conn->prepare($check_sql);
    $stmt->bind_param('s', $token);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        // Token válido, actualizar la columna 'confirmado' a 1
        $update_sql = "UPDATE usuarios SET confirmado = 1 WHERE token = ?";
        $stmt = $conn->prepare($update_sql);
        $stmt->bind_param('s', $token);
        if ($stmt->execute()) {
            echo "<script>alert('Tu correo ha sido confirmado exitosamente.'); window.location.href = 'sesion.php';</script>";
        } else {
            echo "<script>alert('Error al confirmar tu correo.');</script>";
        }
    } else {
        echo "<script>alert('Token no válido o ya utilizado.');</script>";
    }
}

?>
