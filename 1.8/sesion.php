<?php 
$indexpage_css = 'estilos/sesion.css';
$indexja_js = 'javajs/sesion.js';
include 'encabezado.php';
require 'conexion.php';

if (isset($_POST['add_usuario'])) {
    $nombre = $_POST['nombre'];
    $apellidos = $_POST['apellidos'];
    $telefono = $_POST['telefono'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $add_sql = "INSERT INTO usuarios (nombre, apellidos, telefono, email, password) VALUES ('$nombre', '$apellidos', '$telefono', '$email', $password)";
    if ($conn->query($add_sql) === TRUE) {
        echo "<script>alert('Usuario Creado correctamente.');</script>";
    } else {
        $error_msg = $conn->error;
        echo "<script>alert('Error agregando Usuario: $error_msg');</script>";
    }
}
$usuarios_sql = "SELECT * FROM usuarios";
$usuarios_result = $conn->query($usuarios_sql);
?>

<section class="page-title section-bordered">
    <h1 class="narrable">Sesión</h1>
</section>

<main>
<section id="login-section">
    <h2 class="narrable">Iniciar Sesión</h2>
    <form id="login-form" action="inicio-sesion.php" method="post">
        <label for="login-email" class="narrable">Email:</label>
        <input type="email" id="login-email" name="email" novalidate>
        <label for="login-password" class="narrable">Contraseña:</label>
        <input type="password" id="login-password" name="password" novalidate>
        <button type="submit" class="sebutton narrable">Iniciar Sesión</button>
        <p id="login-error"  class="error-message narrable" aria-live="assertive"></p>
        <a href="contactanos.php" id="forgot-password" class="narrable">¿Has olvidado tu contraseña?</a>
    </form>
</section>

<section id="register-section">
    <h2 class="narrable">Crear Cuenta</h2>
    <p class="narrable">Crea tu cuenta. Podrás usar tu email y la contraseña elegida para entrar a tu cuenta y seguir tus pedidos.</p>
    <form id="register-form" action="sesion.php" method="post">
        <label for="name" class="narrable">Nombre:</label>
        <input type="text" id="nombre" name="nombre" novalidate>
        <label for="apellidos" class="narrable">Apellidos:</label>
        <input type="text" id="apellidos" name="apellidos" novalidate>
        <label for="telefono" class="narrable">Teléfono:</label>
        <input type="tel" id="telefono" name="telefono" novalidate>
        <label for="correo" class="narrable">Email:</label>
        <input type="email" id="email" name="email" novalidate>
        <label for="contra" class="narrable">Contraseña:</label>
        <input type="password" id="password" name="password" novalidate>
        <button type="submit" class="narrable sebutton" name="add_usuario">Registrarme</button>
        <p id="register-error" class="error-message narrable" aria-live="assertive"></p>
    </form>
</section>
</main>


<?php include 'footer.php'; ?>