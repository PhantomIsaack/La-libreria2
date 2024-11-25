<?php
session_start();
include 'conexion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Preparar la consulta para evitar inyecciones SQL
    $sql = "SELECT id_usuario, nombre FROM usuarios WHERE email = ? AND password = ? AND confirmado = 1";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si el usuario existe y está confirmado
    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id_usuario, $nombre);
        $stmt->fetch();

        // Iniciar sesión
        $_SESSION['usuario_id'] = $id_usuario;
        $_SESSION['user_name'] = $nombre;

        echo "<script>alert('Usuario ingresado.'); window.location.href='index.php'</script>";
        exit();
    } else {
        // Usuario no encontrado o no confirmado
        echo "<script>alert('Usuario o contraseña incorrectos, o cuenta no confirmada.'); window.location.href='sesion.php';</script>";
        exit();
    }
}
?>
