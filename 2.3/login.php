<?php
session_start();

require 'conexion.php';
$username_sql = "SELECT * FROM administradores";
$nombre = $_POST['username'];
$contrasena = $_POST['password'];


$sql = "SELECT * FROM administradores WHERE nombre = ? AND password = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("ss", $nombre, $contrasena);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $_SESSION['usuario'] = $nombre; 
    header("Location: inicio.php");
} else {
    echo "<script>alert('Nombre o contraseña incorrectos'); window.location.href='admin.php';</script>";
}

$stmt->close();
$conn->close();
?>
